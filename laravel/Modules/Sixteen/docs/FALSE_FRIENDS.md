# False Friends – Sixteen

| Falso Amico | Perché fuorviante | Soluzione |
|-------------|-------------------|-----------|
| `service container` = `facade` | Le facades sono solo proxy | Usa DI diretta nei controller |
| `provider::bind` = configurazione runtime | Il binding è una tantum al boot | Usa config per valori modificabili |
| `boot()` = luogo per tutta la logica | Riservato a registrazioni eventi, non inizializzazione pesante | Sposta logica in servizi dedicati |
