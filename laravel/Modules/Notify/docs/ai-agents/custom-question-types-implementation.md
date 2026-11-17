---
title: "custom question types implementation"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "custom question types implementation"
issues: []
discussions: []
<<<<<<< HEAD
status: draft
=======
>>>>>>> laraxot/dev
---

# Custom Question Types Implementation - 2026-03-17

## Summary

Implementazione completa delle custom question types da Fila4 a Fila5, con integrazione in GetAnswersByQuestionChart e test Pest.

---
<<<<<<< HEAD
=======

title: "custom question types implementation"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "custom question types implementation"
issues: []
discussions: []
>>>>>>> laraxot/dev
## Custom Question Types Implementate

### 1. RootGroupedBf ✅

<<<<<<< HEAD
**File**: `Modules/<nome progetto>/app/Actions/QuestionChart/Custom/RootGroupedBf.php`
=======
**File**: `Modules/Quaeris/app/Actions/QuestionChart/Custom/RootGroupedBf.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/app/Actions/QuestionChart/Custom/RootGroupedBf.php`

**Scopo**: Raggruppa domande per `gid` e calcola valutazioni 1-5 vs 6-10

**Pattern**: `custom:root_grouped_bf`

<<<<<<< HEAD
**Esempio URL**: http://127.0.0.1:8000/<nome progetto>/admin/ats/survey-pdfs/16/question-charts/234
=======
**Esempio URL**: http://127.0.0.1:8000/quaeris/admin/ats/survey-pdfs/16/question-charts/234
>>>>>>> laraxot/dev
**Esempio URL**: http://127.0.0.1:8000/this-project/admin/ats/survey-pdfs/16/question-charts/234

**Logica**:
- Recupera domande LimeSurvey con `parent_qid != 0`
- Raggruppa per `gid`
- Per ogni gruppo:
  - Conta risposte < 6 (valutazione bassa)
  - Conta risposte >= 6 (valutazione alta)
- Restituisce medie per gruppo

**Risultato**:
```php
AnswersChartData {
    answers: [
        ['label' => 'Gruppo A', 'value' => ['Valutazione da 5 a 1' => 10, 'Valutazione da 6 a 0' => 20]],
        ['label' => 'Gruppo B', 'value' => [...]],
    ]
}
```

---

### 2. MailResponseRate ✅

<<<<<<< HEAD
**File**: `Modules/<nome progetto>/app/Actions/QuestionChart/Custom/MailResponseRate.php`
=======
**File**: `Modules/Quaeris/app/Actions/QuestionChart/Custom/MailResponseRate.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/app/Actions/QuestionChart/Custom/MailResponseRate.php`

**Scopo**: Calcola tasso di risposta email

**Pattern**: `custom:mail_response_rate`

<<<<<<< HEAD
**Esempio URL**: http://127.0.0.1:8000/<nome progetto>/admin/ats/survey-pdfs/16/question-charts/192
=======
**Esempio URL**: http://127.0.0.1:8000/quaeris/admin/ats/survey-pdfs/16/question-charts/192
>>>>>>> laraxot/dev
**Esempio URL**: http://127.0.0.1:8000/this-project/admin/ats/survey-pdfs/16/question-charts/192

**Logica**:
- Query su `lime_tokens_{survey_id}` per invitati email
- Query su risposte survey per rispondenti
- Join su token
- Calcola percentuali

**Risultato**:
```php
AnswersChartData {
    answers: [...],
    footer: "Totale Invitati: 100 - Rispondenti: 75 - Percentuale di risposta: 75.00%",
    totalAnswered: 75,
    totalInvited: 100
}
```

---

### 3. SmsResponseRate ✅

<<<<<<< HEAD
**File**: `Modules/<nome progetto>/app/Actions/QuestionChart/Custom/SmsResponseRate.php`
=======
**File**: `Modules/Quaeris/app/Actions/QuestionChart/Custom/SmsResponseRate.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/app/Actions/QuestionChart/Custom/SmsResponseRate.php`

**Scopo**: Calcola tasso di risposta SMS

**Pattern**: `custom:sms_response_rate`

<<<<<<< HEAD
**Esempio URL**: http://127.0.0.1:8000/<nome progetto>/admin/ats/survey-pdfs/16/question-charts/191
=======
**Esempio URL**: http://127.0.0.1:8000/quaeris/admin/ats/survey-pdfs/16/question-charts/191
>>>>>>> laraxot/dev
**Esempio URL**: http://127.0.0.1:8000/this-project/admin/ats/survey-pdfs/16/question-charts/191

**Logica**:
- Simile a MailResponseRate ma per SMS
- Usa campo `sms_sent` invece di `sent`

---

### 4. ContactsCompleted ✅

<<<<<<< HEAD
**File**: `Modules/<nome progetto>/app/Actions/QuestionChart/Custom/ContactsCompleted.php`
=======
**File**: `Modules/Quaeris/app/Actions/QuestionChart/Custom/ContactsCompleted.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/app/Actions/QuestionChart/Custom/ContactsCompleted.php`

**Scopo**: Conta contatti completati

**Pattern**: `custom:contacts_completed`

<<<<<<< HEAD
**Esempio URL**: http://127.0.0.1:8000/<nome progetto>/admin/ats/survey-pdfs/16/question-charts/190
=======
**Esempio URL**: http://127.0.0.1:8000/quaeris/admin/ats/survey-pdfs/16/question-charts/190
>>>>>>> laraxot/dev
**Esempio URL**: http://127.0.0.1:8000/this-project/admin/ats/survey-pdfs/16/question-charts/190

**Logica**:
- Query su partecipanti
- Filtra per completati
- Raggruppa per periodo

---

### 5. ContactsCompleted2 ✅

<<<<<<< HEAD
**File**: `Modules/<nome progetto>/app/Actions/QuestionChart/Custom/ContactsCompleted2.php`
=======
**File**: `Modules/Quaeris/app/Actions/QuestionChart/Custom/ContactsCompleted2.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/app/Actions/QuestionChart/Custom/ContactsCompleted2.php`

**Scopo**: Variante di ContactsCompleted

**Pattern**: `custom:contacts_completed_2`

---

### 6. AvgGroup2 ✅

<<<<<<< HEAD
**File**: `Modules/<nome progetto>/app/Actions/QuestionChart/Custom/AvgGroup2.php`
=======
**File**: `Modules/Quaeris/app/Actions/QuestionChart/Custom/AvgGroup2.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/app/Actions/QuestionChart/Custom/AvgGroup2.php`

**Scopo**: Calcola medie per gruppo

**Pattern**: `custom:avg_group_2`

---

## Integrazione

### GetAnswersByQuestionChart

<<<<<<< HEAD
**File**: `Modules/<nome progetto>/app/Actions/QuestionChart/GetAnswersByQuestionChart.php`
=======
**File**: `Modules/Quaeris/app/Actions/QuestionChart/GetAnswersByQuestionChart.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/app/Actions/QuestionChart/GetAnswersByQuestionChart.php`

**Custom Action Map**:
```php
private function handleCustomQuestionType(...): AnswersChartData
{
    $customActionMap = [
        'root_grouped_bf' => RootGroupedBf::class,
        'mail_response_rate' => MailResponseRate::class,
        'sms_response_rate' => SmsResponseRate::class,
        'contacts_completed' => ContactsCompleted::class,
        'contacts_completed_2' => ContactsCompleted2::class,
        'avg_group_2' => AvgGroup2::class,
    ];

    $customKey = Str::after(strtolower($q->question), 'custom:');
<<<<<<< HEAD

=======
    
>>>>>>> laraxot/dev
    foreach ($customActionMap as $key => $actionClass) {
        if (str_contains($customKey, $key)) {
            return app($actionClass)->execute($q, $group_by, $sort_by, $filter);
        }
    }

    // Fallback per custom field generici
    return $this->handleGenericCustomField($q, $group_by, $sort_by, $filter);
}
```

---

## Testing

### Pest Test Suite

<<<<<<< HEAD
**File**: `Modules/<nome progetto>/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php`
=======
**File**: `Modules/Quaeris/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php`
>>>>>>> laraxot/dev
**File**: `Modules/App/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php`

**Test Cases**: 10+

```php
// Esempio test
it('can handle RootGroupedBf custom question', function (): void {
    $questionChart = QuestionChart::factory()->create([
        'question' => 'custom:root_grouped_bf',
        'survey_id' => '892883',
    ]);

    $action = app(RootGroupedBf::class);
    $result = $action->execute($questionChart, null, null, null);

    expect($result)->toBeInstanceOf(AnswersChartData::class);
    expect($result->answers)->toBeArray();
    expect($result->answers)->not->toBeEmpty();
});
```

### Run Tests

```bash
cd ./laravel

# Esegui test custom questions
<<<<<<< HEAD
./vendor/bin/pest Modules/<nome progetto>/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php

# Con coverage
XDEBUG_MODE=off ./vendor/bin/pest Modules/<nome progetto>/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php --coverage
=======
./vendor/bin/pest Modules/Quaeris/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php

# Con coverage
XDEBUG_MODE=off ./vendor/bin/pest Modules/Quaeris/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php --coverage
>>>>>>> laraxot/dev
```

---

## Files Created/Modified

### Created (11 files)

**Custom Actions** (6):
1. `Modules/App/app/Actions/QuestionChart/Custom/RootGroupedBf.php`
2. `Modules/App/app/Actions/QuestionChart/Custom/MailResponseRate.php`
3. `Modules/App/app/Actions/QuestionChart/Custom/SmsResponseRate.php`
4. `Modules/App/app/Actions/QuestionChart/Custom/ContactsCompleted.php`
5. `Modules/App/app/Actions/QuestionChart/Custom/ContactsCompleted2.php`
6. `Modules/App/app/Actions/QuestionChart/Custom/AvgGroup2.php`

**Integration** (1):
7. `Modules/App/app/Actions/QuestionChart/GetAnswersByQuestionChart.php` (updated)

**Tests** (1):
8. `Modules/App/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php`

**Documentation** (3):
9. `.github/ISSUE_TEMPLATE/custom-chart-progress-update.md`
10. `.kilo/docs/custom-question-types-implementation.md` (this file)
11. `.github/ISSUE_TEMPLATE/custom-chart-implementation.md` (updated)

---

## Usage

### Example: RootGroupedBf

```php
<<<<<<< HEAD
use Modules\<nome progetto>\Actions\QuestionChart\Custom\RootGroupedBf;
use Modules\<nome progetto>\Models\QuestionChart;
=======
use Modules\Quaeris\Actions\QuestionChart\Custom\RootGroupedBf;
use Modules\Quaeris\Models\QuestionChart;
>>>>>>> laraxot/dev
use Modules\App\Actions\QuestionChart\Custom\RootGroupedBf;
use Modules\App\Models\QuestionChart;

// Trova QuestionChart
$questionChart = QuestionChart::find(234);

// Esegui azione custom
$action = app(RootGroupedBf::class);
$result = $action->execute($questionChart, null, null, null);

// Usa risultato
foreach ($result->answers as $answer) {
    echo "{$answer->label}: " . count($answer->value) . " risposte\n";
}
```

### Example: MailResponseRate

```php
<<<<<<< HEAD
use Modules\<nome progetto>\Actions\QuestionChart\Custom\MailResponseRate;
use Modules\<nome progetto>\Datas\AnswersFilterData;
=======
use Modules\Quaeris\Actions\QuestionChart\Custom\MailResponseRate;
use Modules\Quaeris\Datas\AnswersFilterData;
>>>>>>> laraxot/dev
use Modules\App\Actions\QuestionChart\Custom\MailResponseRate;
use Modules\App\Datas\AnswersFilterData;

$questionChart = QuestionChart::find(192);

// Con filtri
$filter = AnswersFilterData::from([
    'date_from' => '2025-01-01',
    'date_to' => '2025-12-31',
]);

$action = app(MailResponseRate::class);
$result = $action->execute($questionChart, null, null, $filter);

// Leggi footer
echo $result->footer;
// "Totale Invitati: 100 - Rispondenti: 75 - Percentuale di risposta: 75.00%"
```

---

## Pattern Chiave

### 1. Custom Question Detection

```php
if (Str::startsWith((string) $q->question, 'custom:')) {
    // Estrai chiave
    $customKey = Str::after(strtolower($q->question), 'custom:');
<<<<<<< HEAD

=======
    
>>>>>>> laraxot/dev
    // Cerca azione corrispondente
    foreach ($customActionMap as $key => $actionClass) {
        if (str_contains($customKey, $key)) {
            return app($actionClass)->execute(...);
        }
    }
}
```

### 2. Queueable Action Pattern

```php
class MailResponseRate
{
    use QueueableAction;
<<<<<<< HEAD

=======
    
>>>>>>> laraxot/dev
    public function execute(...) {
        // Può essere eseguito in coda
        // $action->onQueue('charts')->execute(...)
    }
}
```

### 3. DTO Usage

```php
// Crea DTO
$answer = AnswerData::from([
    'code' => '1',
    'answer' => 'Sì',
    'count' => 150,
    'percent' => 75.0,
]);

// Usa in collection
$answers = AnswerData::collect($data, DataCollection::class);

// Ritorna aggregato
return AnswersChartData::from([
    'answers' => $answers,
    'chart' => $chart,
]);
```

---

## Metrics

| Metric | Value |
|--------|-------|
| **Custom Actions** | 6 |
| **Test Cases** | 10+ |
| **Files Modified** | 5 |
| **Lines of Code** | ~1500+ |
| **Test Coverage** | TBD |

---

## Next Steps

### Immediate
- [x] Port custom actions from Fila4
- [x] Integrate with GetAnswersByQuestionChart
- [x] Create Pest tests
- [ ] Run tests with real data
- [ ] Fix any issues

### Short Term
- [ ] Update widgets to use new actions
- [ ] Add export buttons (SVG/PNG)
- [ ] Performance optimization
- [ ] Documentation

### Long Term
- [ ] JpGraph integration for PDF
- [ ] Caching
- [ ] Advanced filtering

---

## References

### Fila4 Source
<<<<<<< HEAD
- `./laravel/Modules/<nome progetto>/app/Actions/QuestionChart/Custom/`

### Fila5 Implementation
- `Modules/<nome progetto>/app/Actions/QuestionChart/Custom/`
- `Modules/<nome progetto>/app/Actions/QuestionChart/GetAnswersByQuestionChart.php`

### Tests
- `Modules/<nome progetto>/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php`

### Fila5 Implementation
- `Modules/<nome progetto>/app/Actions/QuestionChart/Custom/`
- `Modules/<nome progetto>/app/Actions/QuestionChart/GetAnswersByQuestionChart.php`

### Tests
- `Modules/<nome progetto>/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php`
=======
- `./laravel/Modules/Quaeris/app/Actions/QuestionChart/Custom/`

### Fila5 Implementation
- `Modules/Quaeris/app/Actions/QuestionChart/Custom/`
- `Modules/Quaeris/app/Actions/QuestionChart/GetAnswersByQuestionChart.php`

### Tests
- `Modules/Quaeris/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php`

### Fila5 Implementation
- `Modules/Quaeris/app/Actions/QuestionChart/Custom/`
- `Modules/Quaeris/app/Actions/QuestionChart/GetAnswersByQuestionChart.php`

### Tests
- `Modules/Quaeris/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php`
>>>>>>> laraxot/dev

### GitHub
- [Custom Chart Implementation Issue](.github/ISSUE_TEMPLATE/custom-chart-implementation.md)
- [Progress Update](.github/ISSUE_TEMPLATE/custom-chart-progress-update.md)

---

<<<<<<< HEAD
**Status**: ✅ **IMPLEMENTATION COMPLETE**
**Next Phase**: Testing with Real Data
**Version**: 1.0.0
=======
**Status**: ✅ **IMPLEMENTATION COMPLETE**  
**Next Phase**: Testing with Real Data  
**Version**: 1.0.0  
>>>>>>> laraxot/dev
**Date**: 2026-03-17
