# 🚨 QUAERIS CUSTOM CHARTS - CRITICAL RULES

**Created**: 2026-03-17  
**Priority**: CRITICAL  
**Enforcement**: MANDATORY

---

## RULE #1: NEVER CROSS-DATABASE JOIN

> **NEVER** use join cross-database tra `quaeris_data` e `quaeris_survey`

### Databases

- `quaeris_data`: Quaeris tables (contacts, survey_pdfs, question_charts, etc.)
- `quaeris_survey`: LimeSurvey tables (lime_surveys, lime_questions, lime_survey_{SID}, etc.)

### Correct Pattern

```php
// ✅ CORRECT: Explicit connection
$invited = Contact::on('quaeris_data')
    ->where('survey_pdf_id', $questionChart->survey_pdf_id)
    ->where('sms_count', '!=', 0);

// ❌ WRONG: Cross-database join
$answers = $this->withContacts($questionChart->answers(), $questionChart->survey_id);
// ↑ Tries to join lime_survey_{SID} (quaeris_survey) with contacts (quaeris_data)
```

### Error Example

```sql
-- ❌ ERROR: Table 'quaeris_survey.contacts' doesn't exist
SELECT DATE_FORMAT(submitdate, '%Y-%M') as period, COUNT(*) as answers_count 
FROM `lime_survey_892883`              -- Database: quaeris_survey
INNER JOIN `contacts` as `c`            -- Database: quaeris_data (WRONG!)
    ON `c`.`token` = `lime_survey_892883`.`token`
WHERE ...
```

### Solution

Use separate queries and merge in PHP:

```php
// ✅ CORRECT: Two separate queries, merge in PHP
$invited = Contact::on('quaeris_data')
    ->where('survey_pdf_id', $surveyPdfId)
    ->where('sms_count', '!=', 0)
    ->groupBy('period')
    ->get();

$answers = Contact::on('quaeris_data')
    ->where('survey_pdf_id', $surveyPdfId)
    ->where('sms_count', '!=', 0)
    ->groupBy('period')
    ->get();

// Merge in PHP (not SQL)
$data = $this->mergeInvitedAnswers($invited, $answers);
```

---

## RULE #2: ALWAYS USE EXPLICIT CONNECTION

> **ALWAYS** usa `Model::on('connection_name')` per specificare la connessione

### Correct Pattern

```php
// ✅ CORRECT: Explicit connection
Contact::on('quaeris_data')->where(...);

// ❌ WRONG: Implicit connection (uses default!)
Contact::where(...);
```

### Why

- Prevents accidental cross-database queries
- Makes database intention explicit
- Easier to debug and maintain

---

## RULE #3: ALWAYS SAME EXPRESSION FOR GROUP BY AND ORDER BY

> **ALWAYS** usa la STESSA espressione per GROUP BY e ORDER BY

### Correct Pattern

```php
// ✅ CORRECT: Same expression
$group_by_expr = 'DATE_FORMAT(sms_sent_at, "%Y-%b")';
$sort_by_expr = $group_by_expr;  // ← SAME!

->groupByRaw($group_by_expr)
->orderByRaw($sort_by_expr)

// ❌ WRONG: Different expressions
$group_by_expr = 'DATE_FORMAT(sms_sent_at, "%Y-%b")';
$sort_by_expr = 'DATE_FORMAT(sms_sent_at, "%Y-%m")';  // ← DIFFERENT!

->groupByRaw($group_by_expr . ', ' . $sort_by_expr)  // ERROR!
```

### Why

MySQL `sql_mode=only_full_group_by` requires:
- All non-aggregated SELECT columns must be in GROUP BY
- Using different expressions violates this rule

---

## RULE #4: ALWAYS CONVERT DATACOLLECTION TO ARRAY

> **ALWAYS** converti DataCollection ad array quando necessario

### Correct Pattern

```php
// ✅ CORRECT: Convert to array
$answersArray = $data instanceof \Spatie\LaravelData\DataCollection 
    ? $data->toArray() 
    : (is_array($data) ? $data : []);

$answersChartData = new \Modules\Chart\Datas\AnswersChartData(
    answers: $answersArray,  // ← Array, not DataCollection!
);

// ❌ WRONG: Pass DataCollection directly
$answersChartData = new AnswersChartData(
    answers: $data,  // ERROR if $data is DataCollection!
);
```

### Why

Spatie Laravel Data requires exact types:
- `AnswersChartData::$answers` expects `array`
- Passing `DataCollection` causes TypeError

---

## RULE #5: ALWAYS CLEAR CACHE AFTER FIXES

> **ALWAYS** pulisci cache dopo aver applicato fix

### Commands

```bash
# Laravel cache
php artisan optimize:clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# PHP-FPM (if possible)
service php8.3-fpm reload
```

### Why

- OPcache can serve old compiled code
- Laravel cache can serve old config/views
- Changes may not appear without cache clear

---

## CHECKLIST BEFORE COMMIT

### Database Queries

- [ ] Am I joining tables from different databases?
- [ ] Am I using explicit connection names?
- [ ] Can I use separate queries and merge in PHP instead?

### GROUP BY

- [ ] Are all non-aggregated SELECT columns in GROUP BY?
- [ ] Am I using the SAME expression for GROUP BY and ORDER BY?
- [ ] Is this compatible with `sql_mode=only_full_group_by`?

### Type Safety

- [ ] Am I passing the correct type to Spatie Data?
- [ ] Do I need to convert DataCollection to array?
- [ ] Are all type hints correct?

### Cache

- [ ] Have I cleared Laravel cache?
- [ ] Have I cleared OPcache (if possible)?
- [ ] Have I tested with fresh cache?

---

## RELATED DOCUMENTATION

- **Complete Fixes**: `docs/CUSTOM_CHARTS_COMPLETE_FIXES.md`
- **Cross-DB Rule**: `docs/CROSS_DATABASE_JOIN_RULE.md`
- **MailResponseRate Fix**: `docs/MAILRESPONSERATE_DATACOLLECTION_FIX.md`
- **SmsResponseRate Fix**: `docs/SMSRESPONSERATE_GROUPBY_FIX.md`
- **ContactsCompleted Fix**: `docs/CONTACTSCOMPLETED_DATACOLLECTION_FIX.md`
- **Git History Study**: `docs/GIT_HISTORY_CUSTOM_CHARTS_STUDY.md`

---

## ENFORCEMENT

These rules are **MANDATORY** for all Quaeris custom chart development.

**Violations will be rejected in code review.**

---

**Created**: 2026-03-17  
**Status**: ✅ Active - Enforced  
**Next Review**: After testing session

**OM** 🙏
