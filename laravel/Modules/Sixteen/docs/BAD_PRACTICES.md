# Bad Practices – Sixteen

## ❌ Usare ServiceProvider per funzioni singleton
Usa classi isolate per logiche singole per migliorare testabilità e ridurre coupling.

## ❌ Override di binding predefiniti
Controlla che gli override siano necessari e documentati, evita conflitti globali.

## ❌ Configurazioni dense nel ServiceProvider
Secca l'interfaccia dividendo il provider in multipli_FILE, uno per ogni area di configurazione.
