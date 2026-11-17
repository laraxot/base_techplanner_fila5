# Installazione certificato SSL

## Server attuale: sottana.com (Ploi)

**Guida operativa aggiornata:** [ssl-configuration.md](./ssl-configuration.md)

Riepilogo stato (maggio 2026):

| Check | Stato |
|-------|--------|
| Document root | `/home/ploi/sottana.com/public_html` |
| HTTP / challenge ACME | ✅ Nginx serve `/.well-known/acme-challenge/` |
| DNS A `sottana.com` | ❌ Manca su Hetzner (blocca Let's Encrypt) |
| CNAME `www` | ❌ Punta a `sottana.com.sottana.com` (errato) |
| Certificato / HTTPS | ❌ Installare da **pannello Ploi** dopo fix DNS |

Script di verifica:

```bash
chmod +x bashscripts/utils/verify_ssl_dns.sh
bash bashscripts/utils/verify_ssl_dns.sh
```

---

## Storico: sottana.net (altro server)

Il contenuto seguente documenta un server precedente (`72.61.154.57`, path `sottana.net`). Utile come riferimento se si migrano domini o si unificano certificati.

### Domini (server sottana.net)

- ✅ `sottana.net`, `www.sottana.net` – certificato attivo (server precedente)
- ⚠️ `sottana.com` – su **questo** progetto usare la guida [ssl-configuration.md](./ssl-configuration.md)

### Path storici (non usare su server sottana.com)

- Document root storica: `/home/ploi/sottana.net/public_html`
- Certificati: `/etc/letsencrypt/live/sottana.net/`
- Nginx SSL: `/etc/nginx/ssl/sottana.net`

### Problema proxy/CDN (sottana.com – contesto storico)

Se `sottana.com` passava da CDN con redirect forzato su HTTP, la validazione HTTP-01 falliva. Su Hetzner DNS diretto il blocco attuale è l’**assenza del record A**, non il proxy.

### Comando certbot (root, path storico sottana.net)

```bash
sudo certbot certonly --webroot \
  -w /home/ploi/sottana.net/public_html \
  -d sottana.net -d www.sottana.net \
  --non-interactive --agree-tos --email admin@sottana.net
```

### Troubleshooting generico

- **Certificato mancante in Nginx:** commentare direttive SSL fino all’installazione, poi usare Ploi/Certbot.
- **Duplicati `location /.well-known`:** un solo blocco (Ploi: `disable-basic-auth-well-known.conf`).
- **Rate limit LE:** attendere 1 ora dopo 5 tentativi falliti.
- **Conflitti server_name:** un solo vhost per porta/nome.

### Rinnovo

```bash
sudo systemctl status certbot.timer
```

## Collegamenti

- [Configurazione SSL (server corrente)](./ssl-configuration.md)
- [Deploy e validazione](./deployment-and-validation.md)
- [Certbot docs](https://certbot.eff.org/docs/)
