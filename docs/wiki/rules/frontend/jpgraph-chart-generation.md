# JpGraph Chart Generation Rules

**Versione**: 4.4.3 (PHP 8.5 support)
**Modulo**: Chart

---

## Regole Critiche

### 1. MAI Creare Graph Direttamente

```php
// SBAGLIATO
$graph = new Graph(800, 400);
$graph->SetScale('textlin');

// CORRETTO - Usa GetGraphAction
$graph = app(GetGraphAction::class)->execute($chartData);
```

### 2. SEMPRE Usare DTO Pattern

```php
// SBAGLIATO - Passare parametri singoli
function generateChart($data, $width, $height, $color) { }

// CORRETTO - ChartData e AnswersChartData DTOs
$chartData = ChartData::from(['type' => 'bar2', 'width' => 800, ...]);
$answersChartData = AnswersChartData::from(['answers' => $answers, 'chart' => $chartData]);
```

### 3. SEMPRE Usare Actions

```php
// SBAGLIATO - Logica inline
$plot = new BarPlot($data);
$graph->Add($plot);

// CORRETTO - Action appropriata
$action_class = $chartData->getActionClass();
$graph = app($action_class)->execute($answersChartData);
```

### 4. SEMPRE Gestire Errori

```php
try {
    $graph->Stroke($filePath);
    if (!File::exists($filePath)) {
        throw new \Exception('PNG not created');
    }
} catch (\Throwable $e) {
    \Log::error('JpGraph error', ['error' => $e->getMessage()]);
}
```

### 5. SEMPRE Verificare method_exists

```php
// SBAGLIATO
$graph->yscale->SetGrace(10);

// CORRETTO
if (method_exists($graph->yscale, 'SetGrace')) {
    $graph->yscale->SetGrace($chartData->y_grace);
}
```

### 6. SEMPRE Usare Queue per Dataset Grandi

```php
dispatch(function () use ($chartData, $path) {
    $graph = app(Bar2Action::class)->execute($chartData);
    $graph->Stroke($path);
})->onQueue('charts');
```

## Chart Types Disponibili

| Tipo | Action | Descrizione |
|------|--------|-------------|
| bar1 | Bar1Action | Bar semplice |
| bar2 | Bar2Action | Bar multiplo (GroupBarPlot) |
| bar3 | Bar3Action | Bar stacked (AccBarPlot) |
| horizbar1 | Horizbar1Action | Bar orizzontale |
| pie1 | Pie1Action | Pie chart (PiePlotC) |
| pieAvg | PieAvgAction | Pie con media |
| lineSubQuestion | LineSubQuestionAction | Line multiplo |

## Namespace (amenadiel/jpgraph)

Package: `amenadiel/jpgraph` (in `Modules/Chart/composer.json`)

```php
// Graph
use Amenadiel\JpGraph\Graph\Graph;
use Amenadiel\JpGraph\Graph\PieGraph;
use Amenadiel\JpGraph\Graph\Axis;
use Amenadiel\JpGraph\Graph\Legend;

// Plot
use Amenadiel\JpGraph\Plot\BarPlot;
use Amenadiel\JpGraph\Plot\LinePlot;
use Amenadiel\JpGraph\Plot\PiePlotC;
use Amenadiel\JpGraph\Plot\GroupBarPlot;
use Amenadiel\JpGraph\Plot\AccBarPlot;

// Text e Themes
use Amenadiel\JpGraph\Text\Text;
use Amenadiel\JpGraph\Themes\UniversalTheme;
```

## Documentazione

- `Modules/Chart/docs/jpgraph-installation-and-namespaces.md` - Installazione e namespace
- `Modules/Chart/docs/jpgraph-4-4-3-reference.md` - Reference 4.4.3
- `Modules/Chart/docs/jpgraph-complete-guide.md` - Guida completa
- `Modules/Chart/docs/jpgraph-class-reference-complete.md` - Class reference
