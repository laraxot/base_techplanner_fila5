# Configurazione SSL – server Ploi sottana.com

## Scopo

Abilitare **HTTPS** per `sottana.com` sul server Ploi con document root corretta, senza rompere il deploy Laravel/Folio.

## Infrastruttura (questo server)

| Elemento | Valore |
|----------|--------|
| Document root | `/home/ploi/sottana.com/public_html` |
| Codice applicazione | `/home/ploi/sottana.com/laravel` |
| IP server | `46.225.90.178` |
| Nginx site | `/etc/nginx/sites-available/sottana.com` |
| SSL snippet (Ploi) | `/etc/nginx/ssl/sottana.com` (vuoto finché SSL non è installato) |
| Challenge ACME | `public_html/.well-known/acme-challenge/` |
| HTTP | ✅ `http://sottana.com` risponde (redirect app → `/it`) |
| HTTPS | ✅ Let's Encrypt in `/etc/letsencrypt/live/sottana.com/` (solo apex; `www` dopo fix CNAME) |

### Perché HTTPS non funziona oggi

1. **Nginx** ascolta solo sulla porta **80** per il vhost `sottana.com` (manca `listen 443 ssl`).
2. **`/etc/nginx/ssl/sottana.com`** è vuoto: Ploi non ha ancora scritto i path del certificato.
3. Il **catch-all** su `:443` usa `ssl_reject_handshake on` → errore client `unrecognized name`.
4. **DNS pubblico** (Hetzner) è errato: Let's Encrypt non vede un record **A** valido (vedi sotto).

> Nota: in `/etc/hosts` del server c’è `46.225.90.178 sottana.com`. I test **locali** possono funzionare anche con DNS rotto; **Let's Encrypt e i browser** usano il DNS pubblico.

## Prerequisito obbligatorio: DNS (Hetzner)

Stato DNS (verificare con `bash bashscripts/utils/verify_ssl_dns.sh`):

- Nameserver attuali: spesso `ns1.dns-parking.com` / `ns2.dns-parking.com` (propagazione in corso).
- Sui NS autoritativi il record **A** verso `46.225.90.178` può essere già corretto, mentre resolver pubblici (8.8.8.8, 1.1.1.1) possono ancora non vederlo: attendere propagazione prima di Certbot/Ploi SSL.
- `www.sottana.com`: correggere CNAME errato `sottana.com.sottana.com` → deve puntare a `sottana.com`.
- Configurazione Hetzner storica errata (solo SOA, senza A): da allineare se i NS tornano su Hetzner.

### Record da impostare nel pannello DNS

| Tipo | Nome | Valore | TTL |
|------|------|--------|-----|
| A | `@` (o `sottana.com`) | `46.225.90.178` | 300–3600 |
| CNAME | `www` | `sottana.com` | 300–3600 |

Dopo la modifica, attendere propagazione (5–30 minuti) e verificare:

```bash
bash bashscripts/utils/verify_ssl_dns.sh
```

Oppure:

```bash
dig @8.8.8.8 sottana.com A +short
# Atteso: 46.225.90.178

dig @8.8.8.8 www.sottana.com CNAME +short
# Atteso: sottana.com.
```

## Installazione certificato (Ploi – richiede root)

L’utente `ploi` **non ha sudo**: Certbot e reload Nginx vanno eseguiti dal **pannello Ploi** o da un amministratore con root.

### Errore Ploi: hook Hetzner DNS e `www.sottana.com`

Se in Ploi SSL compare:

- `Could not find zone for www.sottana.com`
- `NXDOMAIN` per `_acme-challenge.www.sottana.com`

**Cause:**

1. **CNAME `www` errato** su Hetzner: valore `sottana.com.sottana.com` invece di `sottana.com` → `www` non risolve e Let's Encrypt non valida il sottodominio.
2. **Hook Ploi (DNS-01)** cerca la zone Hetzner Cloud con nome `www.sottana.com`; la zone registrata è solo **`sottana.com`**, quindi il hook fallisce per `www`.

**Soluzione rapida (consigliata):**

1. In **Hetzner DNS** (Console DNS del dominio `sottana.com`, non Cloud “zones” sbagliate):
   - Eliminare il CNAME errato su `www`.
   - Creare: tipo **CNAME**, nome **`www`**, valore **`sottana.com`** (solo hostname, senza puntare a `sottana.com.sottana.com`).
2. In **Ploi** → SSL: installare prima **solo** `sottana.com` con metodo **webroot** (HTTP-01), non DNS/manual, se disponibile.
3. Dopo che `dig @8.8.8.8 www.sottana.com CNAME +short` restituisce `sottana.com.`, ripetere SSL includendo `www` oppure lasciare redirect `www` → apex in Nginx.

Verifica:

```bash
dig @8.8.8.8 www.sottana.com CNAME +short   # atteso: sottana.com.
dig @8.8.8.8 www.sottana.com A +short       # atteso: 46.225.90.178 (via CNAME)
```

**Sicurezza:** se nei log compare il token in `/home/ploi/.ploi/.certbot-hetzner`, rigenerarlo nel pannello Hetzner e aggiornare il file su Ploi.

### Procedura consigliata (dashboard Ploi)

1. Accedere a **Ploi** → sito **sottana.com**.
2. Verificare che il dominio principale sia `sottana.com` e la root sia `public_html` (path completo sopra).
3. Correggere il CNAME **`www`** su Hetzner (vedi sopra).
4. Sezione **SSL** → **Let's Encrypt** → preferire **webroot**, dominio iniziale solo **`sottana.com`** se `www` fallisce ancora.
5. Aggiungere **`www.sottana.com`** solo dopo DNS corretto.
6. Attendere completamento: Ploi popola `/etc/nginx/ssl/sottana.com` e aggiunge il server block **443**.
7. Abilitare **Force HTTPS** se disponibile.

### Comando equivalente (solo con root, dopo DNS corretto)

```bash
sudo certbot certonly --webroot \
  -w /home/ploi/sottana.com/public_html \
  -d sottana.com \
  -d www.sottana.com \
  --non-interactive --agree-tos --email admin@sottana.com
```

Poi reload Nginx (Ploi di solito lo fa in automatico).

## Dopo l’installazione SSL

### Verifica

```bash
curl -sI https://sottana.com | head -5
openssl s_client -connect sottana.com:443 -servername sottana.com </dev/null 2>/dev/null | openssl x509 -noout -dates -subject
```

### Laravel `.env` produzione

Impostare (nel file `.env` gestito da Ploi/deploy, non committare segreti):

```env
APP_URL=https://sottana.com
FORCE_SSL=true
```

Così URL, asset e cookie di sessione restano coerenti con HTTPS.

## Domini correlati

| Dominio | Server / note |
|---------|----------------|
| `sottana.com` | **Questo** server (`46.225.90.178`) – obiettivo HTTPS |
| `sottana.net` | Altro IP (`72.61.154.57`) – documentazione storica in [ssl-certificate-installation.md](./ssl-certificate-installation.md) |

Non confondere i path: qui la root è `.../sottana.com/public_html`, non `sottana.net`.

## Rinnovo

Su Ploi il rinnovo Let's Encrypt è in genere automatico (`certbot.timer`). Verifica periodica:

```bash
bash bashscripts/utils/verify_ssl_dns.sh
```

## Collegamenti

- [Installazione dettagliata e troubleshooting](./ssl-certificate-installation.md)
- [Deploy e validazione](./deployment-and-validation.md)
- [Tema Two – deploy](../laravel/Themes/Two/docs/deployment-and-validation.md)
- [Documentazione Certbot](https://certbot.eff.org/docs/)
