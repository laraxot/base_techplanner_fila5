# Custom Charts Troubleshooting Guide

**Version**: 1.0.0  
**Last Updated**: 2026-03-17  
**Status**: ✅ Active  
**Complexity**: All Levels

---

## Quick Reference

| Error | Severity | Quick Fix |
|-------|----------|-----------|
| `CreationContext::next()` | CRITICAL | Use arrays instead of objects |
| `Table doesn't exist` | CRITICAL | Remove cross-database joins |
| `not in GROUP BY clause` | CRITICAL | Add all SELECT to GROUP BY |
| `must be of type array` | HIGH | Convert DataCollection with `->toArray()` |
| Charts not rendering | MEDIUM | Clear cache |

---

## Error 1: ChartData DTO Type Error

### Error Message
```
Spatie\LaravelData\Support\Creation\CreationContext::next():
Argument #1 ($dataClass) must be of type string, null given,
called in vendor/spatie/laravel-data/src/DataPipes/CastPropertiesDataPipe.php on line 113
```

### Severity
CRITICAL ❗

### When It Occurs
- Creating `AnswersChartData` with ChartData object
- Spatie Data can't resolve object type

### Stack Trace
```
#0 vendor/spatie/laravel-data/src/DataPipes/CastPropertiesDataPipe.php:113
#1 vendor/spatie/laravel-data/src/Resolvers/DataFromArrayResolver.php:97
<<<<<<< .merge_file_638xBD
#2 Modules/Quaeris/app/Actions/QuestionChart/Custom/MailResponseRate.php:50
=======
<<<<<<< .merge_file_bsDBBy
#2 Modules/Quaeris/app/Actions/QuestionChart/Custom/MailResponseRate.php:50
=======
>>>>>>> .merge_file_N9a57A
#2 Modules/App/app/Actions/QuestionChart/Custom/MailResponseRate.php:50
>>>>>>> .merge_file_4SnF3t
```

### Root Cause
Spatie Data's type resolver expects string for class name, but receives object

### Solution
```php
// BEFORE (WRONG)
$chartData = new ChartData;
$chartData->type = 'bar';
return new AnswersChartData(chart: $chartData, ...);

// AFTER (CORRECT)
return new AnswersChartData(
    chart: [
        'type' => 'bar',
        'title' => 'Mail Response Rate',
    ],
    ...
);
```

### Verification
```bash
# Check for ChartData objects
<<<<<<< .merge_file_638xBD
grep -r "new ChartData" Modules/Quaeris/app/Actions/QuestionChart/Custom/
=======
<<<<<<< .merge_file_bsDBBy
grep -r "new ChartData" Modules/Quaeris/app/Actions/QuestionChart/Custom/
=======
>>>>>>> .merge_file_N9a57A
grep -r "new ChartData" Modules/App/app/Actions/QuestionChart/Custom/
>>>>>>> .merge_file_4SnF3t

# Should return: (empty)
```

### Prevention
- Always use arrays for DTO properties
- Add Rule #1 to code review checklist

---

## Error 2: Cross-Database Join Error

### Error Message
```
SQLSTATE[42S02]: Base table or view not found: 1146
<<<<<<< .merge_file_638xBD
Table 'quaeris_survey.contacts' doesn't exist
=======
<<<<<<< .merge_file_bsDBBy
Table 'quaeris_survey.contacts' doesn't exist
=======
>>>>>>> .merge_file_N9a57A
Table 'app_survey.contacts' doesn't exist
>>>>>>> .merge_file_4SnF3t
```

### Severity
CRITICAL ❗

### When It Occurs
- Joining tables across different databases
- Using wrong connection for table

### Database Map
```
<<<<<<< .merge_file_638xBD
quaeris_data (Connection: 'quaeris')
=======
<<<<<<< .merge_file_bsDBBy
quaeris_data (Connection: 'quaeris')
=======
>>>>>>> .merge_file_N9a57A
app_data (Connection: 'this-project')
>>>>>>> .merge_file_4SnF3t
├── contacts          ← This table
├── survey_pdfs
└── customers

limesurvey (Connection: 'limesurvey')
├── lime_survey_{sid}
├── lime_tokens_{sid}
└── answers
```

### Root Cause
<<<<<<< .merge_file_638xBD
Query uses `limesurvey` connection, but `contacts` table is in `quaeris_data`
=======
<<<<<<< .merge_file_bsDBBy
Query uses `limesurvey` connection, but `contacts` table is in `quaeris_data`
=======
>>>>>>> .merge_file_N9a57A
Query uses `limesurvey` connection, but `contacts` table is in `app_data`
>>>>>>> .merge_file_4SnF3t

### Solution
```php
// BEFORE (WRONG) - Cross-database join
public function withContacts(Builder $builder, string $survey_id): Builder
{
    $contacts_db = app(Contact::class)->getConnection()->getDatabaseName();
    return $builder->join($contacts_db.'.contacts as B', ...);
}

// AFTER (CORRECT) - Direct model usage
public function getSmsAnswers(...) {
    $answers = Contact::where('survey_pdf_id', $questionChart->survey_pdf_id)
        ->where('sms_count', '!=', 0)
        ->get();
    
    return AnswerData::collect($answers->toArray(), DataCollection::class);
}
```

### Verification
```bash
# Check for cross-database joins
<<<<<<< .merge_file_638xBD
grep -r "getConnection()->getDatabaseName()" Modules/Quaeris/app/Actions/QuestionChart/Custom/
=======
<<<<<<< .merge_file_bsDBBy
grep -r "getConnection()->getDatabaseName()" Modules/Quaeris/app/Actions/QuestionChart/Custom/
=======
>>>>>>> .merge_file_N9a57A
grep -r "getConnection()->getDatabaseName()" Modules/App/app/Actions/QuestionChart/Custom/
>>>>>>> .merge_file_4SnF3t

# Should return: (empty)
```

### Prevention
- Never join across databases
- Use separate queries with models
- Merge data in PHP if needed

---

## Error 3: MySQL only_full_group_by

### Error Message
```
SQLSTATE[42000]: Syntax error or access violation: 1055
Expression #2 of SELECT list is not in GROUP BY clause
<<<<<<< .merge_file_638xBD
and contains nonaggregated column 'quaeris_data.contacts.sms_sent_at'
=======
<<<<<<< .merge_file_bsDBBy
and contains nonaggregated column 'quaeris_data.contacts.sms_sent_at'
=======
>>>>>>> .merge_file_N9a57A
and contains nonaggregated column 'app_data.contacts.sms_sent_at'
>>>>>>> .merge_file_4SnF3t
which is not functionally dependent on columns in GROUP BY clause;
this is incompatible with sql_mode=only_full_group_by
```

### Severity
CRITICAL ❗

### When It Occurs
- SELECT has columns not in GROUP BY
- MySQL strict mode enabled (default in 8.0+)

### Root Cause
MySQL `only_full_group_by` mode requires all SELECT columns in GROUP BY

### SQL Analysis
```sql
-- Problematic Query
SELECT 
    DATE_FORMAT(sms_sent_at, '%Y-%b') as label,  -- Expression #1 ✅
    DATE_FORMAT(sms_sent_at, '%Y-%m') as _sort,  -- Expression #2 ❌ NOT IN GROUP BY
    COUNT(*) as value                             -- Aggregated ✅
FROM contacts
GROUP BY DATE_FORMAT(sms_sent_at, '%Y-%b')        -- Missing Expression #2!

-- Fixed Query
SELECT 
    DATE_FORMAT(sms_sent_at, '%Y-%b') as label,
    DATE_FORMAT(sms_sent_at, '%Y-%m') as _sort,
    COUNT(*) as value
FROM contacts
GROUP BY 
    DATE_FORMAT(sms_sent_at, '%Y-%b'),            -- ✅ Expression #1
    DATE_FORMAT(sms_sent_at, '%Y-%m')             -- ✅ Expression #2
```

### Solution
```php
// BEFORE
->groupByRaw('DATE_FORMAT(sms_sent_at, "%Y-%b")')

// AFTER
->groupByRaw('DATE_FORMAT(sms_sent_at, "%Y-%b"), DATE_FORMAT(sms_sent_at, "%Y-%m")')
```

### Verification
```bash
# Check groupByRaw usage
<<<<<<< .merge_file_638xBD
grep -n "groupByRaw" Modules/Quaeris/app/Actions/QuestionChart/Custom/SmsResponseRate.php
=======
<<<<<<< .merge_file_bsDBBy
grep -n "groupByRaw" Modules/Quaeris/app/Actions/QuestionChart/Custom/SmsResponseRate.php
=======
>>>>>>> .merge_file_N9a57A
grep -n "groupByRaw" Modules/App/app/Actions/QuestionChart/Custom/SmsResponseRate.php
>>>>>>> .merge_file_4SnF3t

# Should show both expressions included
```

### Prevention
- Always include all SELECT columns in GROUP BY
- Use Rule #3 checklist
- Test queries in MySQL client first

---

## Error 4: DataCollection Type Mismatch

### Error Message
```
Modules\Chart\Datas\AnswersChartData::__construct():
Argument #3 ($answers) must be of type array,
Spatie\LaravelData\DataCollection given
```

### Severity
HIGH ⚠️

### When It Occurs
- Passing DataCollection directly to AnswersChartData
- Not converting to array first

### Root Cause
`AnswersChartData` expects `array` type, not `DataCollection`

### Solution
```php
// BEFORE
return new AnswersChartData(answers: $data);

// AFTER
$answersArray = $data instanceof DataCollection 
    ? $data->toArray() 
    : (is_array($data) ? $data : []);

return new AnswersChartData(answers: $answersArray);
```

### Verification
```bash
# Check for DataCollection usage
<<<<<<< .merge_file_638xBD
grep -n "AnswersChartData::from" Modules/Quaeris/app/Actions/QuestionChart/Custom/*.php
=======
<<<<<<< .merge_file_bsDBBy
grep -n "AnswersChartData::from" Modules/Quaeris/app/Actions/QuestionChart/Custom/*.php
=======
>>>>>>> .merge_file_N9a57A
grep -n "AnswersChartData::from" Modules/App/app/Actions/QuestionChart/Custom/*.php
>>>>>>> .merge_file_4SnF3t

# All should use ->toArray()
```

### Prevention
- Always convert DataCollection with `->toArray()`
- Add Rule #4 to code review

---

## Error 5: Cache Issues

### Symptoms
- Changes not appearing
- Old code still executing
- Tests pass but manual test fails

### Severity
MEDIUM 📋

### Root Cause
Laravel caches views, config, and application state

### Solution
```bash
# Clear all caches
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear
php artisan optimize:clear
```

### Verification
```bash
# Verify cache is cleared
ls bootstrap/cache/
# Should be empty or only .gitignore

ls storage/framework/views/
# Should be empty or minimal
```

### Prevention
- Clear cache after every code change
- Add to deployment script
- Make it a habit

---

## Error 6: Charts Not Rendering

### Symptoms
- Blank chart area
- No errors in Laravel logs
- Console may have errors

### Severity
MEDIUM 📋

### Diagnostic Steps

#### Step 1: Check Browser Console
```javascript
// Look for errors like:
- "Cannot read property 'data' of undefined"
- "Chart is not defined"
- "404 Not Found" (for chart data)
```

#### Step 2: Check Data Format
```php
// Verify answers is array
is_array($answersData->answers);  // Should be true

// Verify chart has type
isset($answersData->chart['type']);  // Should be true
```

#### Step 3: Check Cache
```bash
php artisan cache:clear
php artisan view:clear
```

#### Step 4: Check Database
```sql
-- Verify data exists
SELECT COUNT(*) FROM contacts 
WHERE survey_pdf_id = 16 AND sms_count != 0;
```

### Common Causes
1. Wrong data format (not array)
2. Missing chart type
3. Empty answers array
4. JavaScript errors
5. Cache issues

### Solution Checklist
- [ ] Clear cache
- [ ] Check data format
- [ ] Verify chart type
- [ ] Check browser console
- [ ] Verify database has data
- [ ] Check widget rendering

---

## Debugging Tools

### Laravel Debugbar
```bash
composer require barryvdh/laravel-debugbar --dev
```

**Features**:
- Query log
- Route information
- View data
- Timeline

### Ray Debugging
```bash
composer require spatie/laravel-ray --dev
```

**Usage**:
```php
ray($data)->color('red');
ray()->showQueries();
```

### Laravel Telescope
```bash
composer require laravel/telescope
php artisan telescope:install
php artisan migrate
```

**Features**:
- Request debugging
- Exception tracking
- Query monitoring
- Cache inspection

---

## Performance Issues

### Slow Queries

#### Symptom
Charts take > 2 seconds to load

#### Diagnosis
```bash
# Enable query log
php artisan tinker
>>> DB::enableQueryLog();
>>> // Load chart
>>> print_r(DB::getQueryLog());
```

#### Common Causes
1. N+1 queries
2. Missing indexes
3. Cross-database joins
4. No caching

#### Solutions
```php
// Add indexes
Schema::table('contacts', function (Blueprint $table) {
    $table->index(['survey_pdf_id', 'sms_count']);
    $table->index('sms_sent_at');
});

// Add caching
$cacheKey = "question_chart_{$questionChart->id}";
return Cache::remember($cacheKey, 3600, function () {
    return $this->execute($questionChart);
});
```

### High Memory Usage

#### Symptom
PHP memory limit exceeded

#### Diagnosis
```bash
# Check memory usage
php -r "echo memory_get_peak_usage(true);"
```

#### Solutions
```php
// Convert DataCollection to array early
$answersArray = $data->toArray();  // Frees memory

// Use lazy collections
$largeSet->lazy()->map(...);

// Chunk large queries
Contact::query()->chunk(100, function ($contacts) {
    // Process
});
```

---

## Testing Commands

### Run All Tests
```bash
cd laravel
<<<<<<< .merge_file_638xBD
./vendor/bin/pest Modules/Quaeris/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php
=======
<<<<<<< .merge_file_bsDBBy
./vendor/bin/pest Modules/Quaeris/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php
=======
>>>>>>> .merge_file_N9a57A
./vendor/bin/pest Modules/App/tests/Unit/Actions/QuestionChart/CustomQuestionTypesTest.php
>>>>>>> .merge_file_4SnF3t
```

### Run Single Test
```bash
./vendor/bin/pest --filter="can handle MailResponseRate"
```

### Check Code Quality
```bash
# PHPStan
<<<<<<< .merge_file_638xBD
./vendor/bin/phpstan analyse Modules/Quaeris/app/Actions/QuestionChart/Custom/
=======
<<<<<<< .merge_file_bsDBBy
./vendor/bin/phpstan analyse Modules/Quaeris/app/Actions/QuestionChart/Custom/

# Pint (formatting)
./vendor/bin/pint Modules/Quaeris/app/Actions/QuestionChart/Custom/

# Tests with coverage
XDEBUG_MODE=off ./vendor/bin/pest --coverage Modules/Quaeris/tests/
=======
./vendor/bin/phpstan analyse Modules/App/app/Actions/QuestionChart/Custom/
>>>>>>> .merge_file_N9a57A

# Pint (formatting)
./vendor/bin/pint Modules/Quaeris/app/Actions/QuestionChart/Custom/

# Tests with coverage
<<<<<<< .merge_file_638xBD
XDEBUG_MODE=off ./vendor/bin/pest --coverage Modules/Quaeris/tests/
=======
XDEBUG_MODE=off ./vendor/bin/pest --coverage Modules/App/tests/
>>>>>>> .merge_file_4SnF3t
>>>>>>> .merge_file_N9a57A
```

### Manual Testing URLs
```
/question-charts/192  # MailResponseRate
/question-charts/191  # SmsResponseRate
/question-charts/190  # ContactsCompleted
/question-charts/234  # RootGroupedBf
```

---

## Quick Fix Scripts

### Fix All Caches
```bash
#!/bin/bash
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear
php artisan optimize:clear
echo "✅ All caches cleared"
```

### Check File Sizes
```bash
#!/bin/bash
<<<<<<< .merge_file_638xBD
for file in Modules/Quaeris/app/Actions/QuestionChart/Custom/*.php; do
=======
<<<<<<< .merge_file_bsDBBy
for file in Modules/Quaeris/app/Actions/QuestionChart/Custom/*.php; do
=======
>>>>>>> .merge_file_N9a57A
for file in Modules/App/app/Actions/QuestionChart/Custom/*.php; do
>>>>>>> .merge_file_4SnF3t
    lines=$(wc -l < "$file")
    if [ $lines -gt 200 ]; then
        echo "⚠️  $file has $lines lines (max 200)"
    else
        echo "✅ $file has $lines lines"
    fi
done
```

### Find ChartData Objects
```bash
#!/bin/bash
<<<<<<< .merge_file_638xBD
grep -r "new ChartData" Modules/Quaeris/app/Actions/QuestionChart/Custom/
=======
<<<<<<< .merge_file_bsDBBy
grep -r "new ChartData" Modules/Quaeris/app/Actions/QuestionChart/Custom/
=======
>>>>>>> .merge_file_N9a57A
grep -r "new ChartData" Modules/App/app/Actions/QuestionChart/Custom/
>>>>>>> .merge_file_4SnF3t
if [ $? -eq 0 ]; then
    echo "❌ Found ChartData objects - replace with arrays!"
else
    echo "✅ No ChartData objects found"
fi
```

---

## Getting Help

### Documentation
- Deep Dive Guide: `.kilo/docs/custom-charts-deep-dive.md`
- Comprehensive Rules: `.kilo/rules/custom-charts-comprehensive-rules.mdc`
- Session Memory: `.kilo/memories/session-2026-03-17-custom-charts-deep.md`

### GitHub
<<<<<<< .merge_file_638xBD
- Issue #97: https://github.com/laraxot/base_quaeris_fila5_mono/issues/97
=======
<<<<<<< .merge_file_bsDBBy
- Issue #97: https://github.com/laraxot/base_quaeris_fila5_mono/issues/97
=======
>>>>>>> .merge_file_N9a57A
- Issue #97: https://github.com/laraxot/base_ptvx_fila5_mono/issues/97
>>>>>>> .merge_file_4SnF3t
- All 8 comments with fixes

### Team Contacts
- Tech Lead: [Contact Info]
- Database Expert: [Contact Info]
- Laravel Expert: [Contact Info]

---

**Last Review**: 2026-03-17  
**Next Review**: 2026-03-24  
**Maintainer**: Development Team  
**Status**: ✅ Active and Complete
