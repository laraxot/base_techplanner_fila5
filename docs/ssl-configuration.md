# SSL Configuration for Laravel Application

## Configurazione SSL per sottana.net

Quando l'applicazione viene eseguita con SSL/HTTPS, è necessario aggiornare il file `.env` per riflettere l'URL sicuro:

```env
APP_URL=https://sottana.net
```

Questo garantisce:
- Gli URL degli asset vengono generati con HTTPS
- I redirect mantengono il protocollo HTTPS
- I cookie di sessione vengono gestiti correttamente con il flag secure quando appropriato

## Certificati SSL

I certificati SSL sono gestiti tramite Let's Encrypt e Certbot. Per dettagli completi sull'installazione, vedere [SSL Certificate Installation](./ssl-certificate-installation.md).

### Domini Configurati

- ✅ `sottana.net` - Certificato SSL attivo
- ✅ `www.sottana.net` - Certificato SSL attivo (redirect a sottana.net)
- ⚠️ `sottana.com` - In attesa (problema proxy/CDN)
- ⚠️ `www.sottana.com` - In attesa (problema proxy/CDN)

### Configurazione Nginx

I certificati SSL sono configurati in Nginx con:
- Certificati Let's Encrypt: `/etc/letsencrypt/live/sottana.net/`
- Configurazione SSL: `/etc/nginx/ssl/sottana.net`
- Server block principale: `/etc/nginx/sites-enabled/sottana.net`

### Verifica Configurazione

Dopo la configurazione SSL, verificare che tutto funzioni:

```bash
# Verifica configurazione Nginx
sudo nginx -t

# Verifica certificati installati
sudo certbot certificates

# Test connessione HTTPS
curl -I https://sottana.net
```

## Collegamenti Correlati

- [Installazione Certificato SSL](./ssl-certificate-installation.md)
- [Documentazione Nginx](https://nginx.org/en/docs/)
- [Documentazione Certbot](https://certbot.eff.org/docs/)