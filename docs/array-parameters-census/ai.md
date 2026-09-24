# Modulo AI — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **26**

---

## `Modules/AI/app/Actions/Ollama/ChatOllamaAction.php`

Namespace: `Modules\AI\Actions\Ollama`

### `public function execute(...)` — class `ChatOllamaAction` (linea 56)

```php
function execute(string $message, array $options = [])
```

**Parametri array:**
- `array $options = []`

---

## `Modules/AI/app/Actions/Ollama/GenerateOllamaAction.php`

Namespace: `Modules\AI\Actions\Ollama`

### `public function execute(...)` — class `GenerateOllamaAction` (linea 51)

```php
function execute(string $prompt, array $options = [])
```

**Parametri array:**
- `array $options = []`

---

## `Modules/AI/app/Actions/AiJsonResponseDecoderAction.php`

Namespace: `Modules\AI\Actions`

### `private static function stringKeyArray(...)` — class `AiJsonResponseDecoderAction` (linea 77)

```php
function stringKeyArray(array $decoded)
```

**Parametri array:**
- `array $decoded`

---

## `Modules/AI/app/Actions/GeneratePredictionsAction.php`

Namespace: `Modules\AI\Actions`

### `public function execute(...)` — class `GeneratePredictionsAction` (linea 39)

```php
function execute(string $topic, array $options = [])
```

**Parametri array:**
- `array $options = []`

### `private function buildPrompt(...)` — class `GeneratePredictionsAction` (linea 70)

```php
function buildPrompt(string $topic, array $options)
```

**Parametri array:**
- `array $options`

### `private function validate(...)` — class `GeneratePredictionsAction` (linea 239)

```php
function validate(array $data)
```

**Parametri array:**
- `array $data`

### `private function validateRequiredFields(...)` — class `GeneratePredictionsAction` (linea 254)

```php
function validateRequiredFields(array $data)
```

**Parametri array:**
- `array $data`

### `private function validateClosedAt(...)` — class `GeneratePredictionsAction` (linea 267)

```php
function validateClosedAt(array $data)
```

**Parametri array:**
- `array $data`

### `private function validateTags(...)` — class `GeneratePredictionsAction` (linea 287)

```php
function validateTags(array $data)
```

**Parametri array:**
- `array $data`

### `private function validateLiquidityParameter(...)` — class `GeneratePredictionsAction` (linea 297)

```php
function validateLiquidityParameter(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/AI/app/Actions/Predict/GeneratePredictionDraftsAction.php`

Namespace: `Modules\AI\Actions\Predict`

### `private function normalizeTags(...)` — class `GeneratePredictionDraftsAction` (linea 224)

```php
function normalizeTags(array $tags)
```

**Parametri array:**
- `array $tags`

---

## `Modules/AI/app/Actions/Prompt/BuildAIPromptAction.php`

Namespace: `Modules\AI\Actions\Prompt`

### `public function execute(...)` — class `BuildAIPromptAction` (linea 20)

```php
function execute(string $type, array $params = [])
```

**Parametri array:**
- `array $params = []`

### `private function priority(...)` — class `BuildAIPromptAction` (linea 128)

```php
function priority(string $title, string $description, array $context)
```

**Parametri array:**
- `array $context`

### `private function routing(...)` — class `BuildAIPromptAction` (linea 160)

```php
function routing(array $tickets, array $agents)
```

**Parametri array:**
- `array $tickets`
- `array $agents`

### `private function patternAnalysis(...)` — class `BuildAIPromptAction` (linea 203)

```php
function patternAnalysis(array $tickets)
```

**Parametri array:**
- `array $tickets`

### `private function improvements(...)` — class `BuildAIPromptAction` (linea 226)

```php
function improvements(array $data)
```

**Parametri array:**
- `array $data`

### `private function paramString(...)` — class `BuildAIPromptAction` (linea 236)

```php
function paramString(array $params, string $key)
```

**Parametri array:**
- `array $params`

### `private function stringKeyMap(...)` — class `BuildAIPromptAction` (linea 248)

```php
function stringKeyMap(array $input)
```

**Parametri array:**
- `array $input`

### `private function ticketList(...)` — class `BuildAIPromptAction` (linea 264)

```php
function ticketList(array $input)
```

**Parametri array:**
- `array $input`

---

## `Modules/AI/app/Actions/Sentiment/AnalyzeBasicSentimentAction.php`

Namespace: `Modules\AI\Actions\Sentiment`

### `private function countWholeWordMatches(...)` — class `AnalyzeBasicSentimentAction` (linea 46)

```php
function countWholeWordMatches(string $text, array $words)
```

**Parametri array:**
- `array $words`

---

## `Modules/AI/app/Actions/Sentiment/BasicSentimentAnalyzer.php`

Namespace: `Modules\AI\Actions\Sentiment`

### `private function countWholeWordMatches(...)` — class `BasicSentimentAnalyzer` (linea 46)

```php
function countWholeWordMatches(string $text, array $words)
```

**Parametri array:**
- `array $words`

---

## `Modules/AI/app/Datas/OpenAiPredictionMapper.php`

Namespace: `Modules\AI\Datas`

### `public static function toPredictionData(...)` — class `OpenAiPredictionMapper` (linea 16)

```php
function toPredictionData(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/AI/app/Datas/PredictionData.php`

Namespace: `Modules\AI\Datas`

### `public static function fromOpenAIResponse(...)` — class `PredictionData` (linea 75)

```php
function fromOpenAIResponse(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/AI/app/Filament/Pages/FineTuning.php`

Namespace: `Modules\AI\Filament\Pages`

### `protected function sendFineTuningRequest(...)` — class `FineTuning` (linea 120)

```php
function sendFineTuningRequest(array $data, string $endpoint)
```

**Parametri array:**
- `array $data`

---

## `Modules/AI/tests/Support/OpenAiHttpFake.php`

Namespace: `Modules\AI\Tests\Support`

### `public static function predictionPayload(...)` — class `OpenAiHttpFake` (linea 17)

```php
function predictionPayload(array $overrides = [])
```

**Parametri array:**
- `array $overrides = []`

### `public static function fakeCompletions(...)` — class `OpenAiHttpFake` (linea 40)

```php
function fakeCompletions(array $payload)
```

**Parametri array:**
- `array $payload`

