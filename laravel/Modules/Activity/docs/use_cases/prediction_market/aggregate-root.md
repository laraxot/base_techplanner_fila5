<<<<<<< HEAD
# Radice Aggregate per <nome progetto>ion Market

La radice aggregate `<nome progetto>ionMarketAggregateRoot` è responsabile della gestione della logica di business per un mercato di previsione. Incapsula gli eventi e garantisce che lo stato del mercato rimanga coerente.
=======
# Radice Aggregate per Prediction Market

La radice aggregate `PredictionMarketAggregateRoot` è responsabile della gestione della logica di business per un mercato di previsione. Incapsula gli eventi e garantisce che lo stato del mercato rimanga coerente.
>>>>>>> 6ed19256f (.)

## Funzionalità Principali

- Creazione di un nuovo mercato di previsione.
- Registrazione delle scommesse degli utenti.
- Aggiornamento delle probabilità del mercato.
- Risoluzione del mercato e distribuzione dei pagamenti.

## Esempio di Implementazione

```php
namespace Modules\Activity\Aggregates;

<<<<<<< HEAD
use Modules\Activity\Events\<nome progetto>ionMarket\MarketCreated;
use Modules\Activity\Events\<nome progetto>ionMarket\BetPlaced;
use Modules\Activity\Events\<nome progetto>ionMarket\MarketUpdated;
use Modules\Activity\Events\<nome progetto>ionMarket\MarketResolved;
use Modules\Activity\Events\<nome progetto>ionMarket\PayoutDistributed;

class <nome progetto>ionMarketAggregateRoot
=======
use Modules\Activity\Events\PredictionMarket\MarketCreated;
use Modules\Activity\Events\PredictionMarket\BetPlaced;
use Modules\Activity\Events\PredictionMarket\MarketUpdated;
use Modules\Activity\Events\PredictionMarket\MarketResolved;
use Modules\Activity\Events\PredictionMarket\PayoutDistributed;

class PredictionMarketAggregateRoot
>>>>>>> 6ed19256f (.)
{
    private $marketId;
    private $bets = [];
    private $probabilities = [];
    private $status = 'open';
    private $winningOption = null;

    public static function createMarket(
        string $marketId,
        string $title,
        string $description,
        string $endDate,
        string $creatorId
    ): self {
        $aggregate = new self();
        $aggregate->recordThat(new MarketCreated($marketId, $title, $description, $endDate, $creatorId));
        return $aggregate;
    }

    public function placeBet(string $userId, string $optionId, float $amount, string $timestamp)
    {
        if ($this->status !== 'open') {
            throw new \Exception('Cannot place bet on a closed market');
        }
        $this->recordThat(new BetPlaced($this->marketId, $userId, $optionId, $amount, $timestamp));
    }

    public function updateProbabilities(array $newProbabilities, string $timestamp)
    {
        if ($this->status !== 'open') {
            throw new \Exception('Cannot update probabilities on a closed market');
        }
        $this->recordThat(new MarketUpdated($this->marketId, $newProbabilities, $timestamp));
    }

    public function resolveMarket(string $winningOptionId, string $timestamp)
    {
        if ($this->status !== 'open') {
            throw new \Exception('Market already resolved');
        }
        $this->recordThat(new MarketResolved($this->marketId, $winningOptionId, $timestamp));
    }

    public function distributePayout(string $userId, float $amount, string $timestamp)
    {
        if ($this->status !== 'resolved') {
            throw new \Exception('Market not yet resolved');
        }
        $this->recordThat(new PayoutDistributed($this->marketId, $userId, $amount, $timestamp));
    }

    protected function applyMarketCreated(MarketCreated $event)
    {
        $this->marketId = $event->marketId;
    }

    protected function applyBetPlaced(BetPlaced $event)
    {
        $this->bets[] = [
            'userId' => $event->userId,
            'optionId' => $event->optionId,
            'amount' => $event->amount
        ];
    }

    protected function applyMarketUpdated(MarketUpdated $event)
    {
        $this->probabilities = $event->newProbabilities;
    }

    protected function applyMarketResolved(MarketResolved $event)
    {
        $this->status = 'resolved';
        $this->winningOption = $event->winningOptionId;
    }

    private function recordThat($event)
    {
        // Logica per registrare l'evento
    }
}
```

## Considerazioni

- La radice aggregate impedisce operazioni non valide, come piazzare scommesse su un mercato chiuso.
<<<<<<< HEAD
- Gli eventi vengono applicati per aggiornare lo stato interno, garantendo che la logica di business sia centralizzata.
=======
- Gli eventi vengono applicati per aggiornare lo stato interno, garantendo che la logica di business sia centralizzata.
>>>>>>> 6ed19256f (.)
