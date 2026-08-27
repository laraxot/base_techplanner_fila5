# 🏛 Filament Widgets Architecture

**File**: `.agents/docs/architecture/agents-filament-widgets.md`  
**Ultimo Aggiornamento**: 2026-03-20  
**Stato**: ✅ CRITICAL RULE

---

## 🔴 REGOLA FONDAMENTALE

> **SEMPRE usare Filament Table Widgets per le liste**  
> **MAI usare `foreach` in blade per le liste**

---

## ❌ SBAGLIATO (VIETATO!)

### Blade Custom con foreach
```blade
<<<<<<< .merge_file_eNNsdE
{{-- ❌ VIETATO - Themes/TwentyOne/resources/views/pages/predicts/index.blade.php --}}
<div class="grid grid-cols-3">
    @foreach($predicts as $predict)
        <div class="card">
            <h3>{{ $predict->title }}</h3>
            <p>{{ $predict->volume }} CR</p>
=======
{{-- ❌ VIETATO - Themes/TwentyOne/resources/views/pages/forecasts/index.blade.php --}}
<div class="grid grid-cols-3">
    @foreach($forecasts as $forecast)
        <div class="card">
            <h3>{{ $forecast->title }}</h3>
            <p>{{ $forecast->volume }} CR</p>
>>>>>>> .merge_file_As3mQv
        </div>
    @endforeach
</div>
```

**Problemi**:
- ❌ Niente search automatica
- ❌ Niente filters automatici
- ❌ Niente sorting automatico
- ❌ Niente pagination automatica
- ❌ Codice ripetuto (non DRY)
- ❌ Non testabile facilmente
- ❌ 270+ righe di codice

### Livewire in Themes
```
❌ VIETATO:
<<<<<<< .merge_file_q4i0MX
Themes/TwentyOne/Http/Livewire/PredictComponent.php
=======
<<<<<<< .merge_file_eNNsdE
Themes/TwentyOne/Http/Livewire/PredictComponent.php
=======
>>>>>>> .merge_file_qPmxBx
Themes/TwentyOne/Http/Livewire/ForecastComponent.php
>>>>>>> .merge_file_As3mQv
```

---

## ✅ CORRETTO (SEMPRE!)

### Filament Table Widget
```php
<<<<<<< .merge_file_q4i0MX
// ✅ CORRETTO - Modules/Predict/Filament/Widgets/PredictTableWidget.php
namespace Modules\Predict\Filament\Widgets;
=======
<<<<<<< .merge_file_eNNsdE
// ✅ CORRETTO - Modules/Predict/Filament/Widgets/PredictTableWidget.php
namespace Modules\Predict\Filament\Widgets;
=======
>>>>>>> .merge_file_qPmxBx
// ✅ CORRETTO - Modules/Forecast/Filament/Widgets/ForecastTableWidget.php
namespace Modules\Forecast\Filament\Widgets;
>>>>>>> .merge_file_As3mQv

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

<<<<<<< .merge_file_q4i0MX
class PredictTableWidget extends BaseWidget
=======
<<<<<<< .merge_file_eNNsdE
class PredictTableWidget extends BaseWidget
=======
>>>>>>> .merge_file_qPmxBx
class ForecastTableWidget extends BaseWidget
>>>>>>> .merge_file_As3mQv
{
    public function table(Table $table): Table
    {
        return $table
<<<<<<< .merge_file_q4i0MX
            ->query(Predict::query()->where('status', 'active'))
=======
<<<<<<< .merge_file_eNNsdE
            ->query(Predict::query()->where('status', 'active'))
=======
>>>>>>> .merge_file_qPmxBx
            ->query(Forecast::query()->where('status', 'active'))
>>>>>>> .merge_file_As3mQv
            ->searchable()              // ✅ Search automatica
            ->filters([                 // ✅ Filters automatici
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'title')
                    ->multiple(),
            ])
            ->sorts([                   // ✅ Sorting automatico
                'hot' => Tables\Columns\Column::make('hot'),
                'recent' => Tables\Columns\Column::make('published_at'),
            ])
            ->columns([                 // ✅ Colonne definite
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('volume')->money('CR'),
            ])
            ->contentGrid([             // ✅ Responsive grid
                'md' => 1,
                'lg' => 2,
                'xl' => 3,
            ]);
    }
}
```

### View Blade (Solo @livewire)
```blade
<<<<<<< .merge_file_q4i0MX
{{-- ✅ CORRETTO - Themes/TwentyOne/resources/views/filament/widgets/predict-table.blade.php --}}
@livewire(\Modules\Predict\Filament\Widgets\PredictTableWidget::class)
=======
<<<<<<< .merge_file_eNNsdE
{{-- ✅ CORRETTO - Themes/TwentyOne/resources/views/filament/widgets/predict-table.blade.php --}}
@livewire(\Modules\Predict\Filament\Widgets\PredictTableWidget::class)
=======
>>>>>>> .merge_file_qPmxBx
{{-- ✅ CORRETTO - Themes/TwentyOne/resources/views/filament/widgets/forecast-table.blade.php --}}
@livewire(\Modules\Forecast\Filament\Widgets\ForecastTableWidget::class)
>>>>>>> .merge_file_As3mQv
```

### JSON CMS
```json
{
<<<<<<< .merge_file_q4i0MX
    "slug": "predicts.index",
=======
<<<<<<< .merge_file_eNNsdE
    "slug": "predicts.index",
=======
>>>>>>> .merge_file_qPmxBx
    "slug": "forecasts.index",
>>>>>>> .merge_file_As3mQv
    "content_blocks": {
        "it": [
            {
                "type": "widget",
                "data": {
<<<<<<< .merge_file_q4i0MX
                    "view": "pub_theme::filament.widgets.predict-table",
                    "widget": "Modules\\Predict\\Filament\\Widgets\\PredictTableWidget"
=======
<<<<<<< .merge_file_eNNsdE
                    "view": "pub_theme::filament.widgets.predict-table",
                    "widget": "Modules\\Predict\\Filament\\Widgets\\PredictTableWidget"
=======
>>>>>>> .merge_file_qPmxBx
                    "view": "pub_theme::filament.widgets.forecast-table",
                    "widget": "Modules\\Forecast\\Filament\\Widgets\\ForecastTableWidget"
>>>>>>> .merge_file_As3mQv
                }
            }
        ]
    }
}
```

---

## 📊 CONFRONTO DIRETTO

| Feature | Blade Custom | Filament Table | Miglioramento |
|---------|--------------|----------------|---------------|
| **Righe Codice** | 270+ | 23 | -91% |
| **Search** | 50+ righe manuali | 1 riga (`->searchable()`) | -98% |
| **Filters** | 100+ righe manuali | 3 righe (`->filters([...])`) | -97% |
| **Sorting** | 30+ righe manuali | 5 righe (`->sorts([...])`) | -85% |
| **Pagination** | 40+ righe manuali | Automatica | -100% |
| **Responsive** | 20+ righe CSS | 3 righe (`->contentGrid()`) | -85% |
| **Testing** | Difficile | Facile (test helpers) | +100% |
| **Type Safety** | No | Sì (PHP forte) | +100% |

---

## 🎯 ARCHITETTURA

### Directory Structure

```
laravel/
├── Modules/
<<<<<<< .merge_file_eNNsdE
│   └── Predict/
│       ├── Filament/
│       │   └── Widgets/
│       │       └── PredictTableWidget.php  ✅ LOGICA
│       └── Models/
│           └── Predict.php                  ✅ DATI
=======
│   └── Forecast/
│       ├── Filament/
│       │   └── Widgets/
│       │       └── ForecastTableWidget.php  ✅ LOGICA
│       └── Models/
│           └── Forecast.php                  ✅ DATI
>>>>>>> .merge_file_As3mQv
│
└── Themes/
    └── TwentyOne/
        └── resources/views/
            └── filament/
                └── widgets/
<<<<<<< .merge_file_q4i0MX
                    └── predict-table.blade.php  ✅ VISTA
=======
<<<<<<< .merge_file_eNNsdE
                    └── predict-table.blade.php  ✅ VISTA
=======
>>>>>>> .merge_file_qPmxBx
                    └── forecast-table.blade.php  ✅ VISTA
>>>>>>> .merge_file_As3mQv
```

### Flusso Dati

```
<<<<<<< .merge_file_q4i0MX
1. HTTP Request → predicts.index
=======
<<<<<<< .merge_file_eNNsdE
1. HTTP Request → predicts.index
=======
>>>>>>> .merge_file_qPmxBx
1. HTTP Request → forecasts.index
>>>>>>> .merge_file_As3mQv
   ↓
2. Folio Route → [container0]/index.blade.php
   ↓
3. CMS Action → ResolvePageAction
   ↓
<<<<<<< .merge_file_q4i0MX
=======
<<<<<<< .merge_file_eNNsdE
>>>>>>> .merge_file_qPmxBx
4. JSON Config → predicts.index.json
   ↓
5. Widget Render → Modules/Predict/Filament/Widgets/PredictTableWidget.php
   ↓
6. View Render → Themes/TwentyOne/resources/views/filament/widgets/predict-table.blade.php
<<<<<<< .merge_file_q4i0MX
=======
=======
>>>>>>> .merge_file_qPmxBx
4. JSON Config → forecasts.index.json
   ↓
5. Widget Render → Modules/Forecast/Filament/Widgets/ForecastTableWidget.php
   ↓
6. View Render → Themes/TwentyOne/resources/views/filament/widgets/forecast-table.blade.php
>>>>>>> .merge_file_As3mQv
   ↓
7. HTML Response → Browser
```

---

## 📋 CHECKLIST PRE-COMMIT

Prima di commitare una pagina list/grid:

- [ ] **NO** `Themes/*/Http/Livewire/` directory
- [ ] **NO** `foreach` in blade per liste
- [ ] **YES** `Modules/*/Filament/Widgets/*TableWidget.php`
- [ ] **YES** `extends XotBaseTableWidget` (o `TableWidget`)
- [ ] **YES** `->searchable()`, `->filters()`, `->paginated()`
- [ ] **YES** View blade SOLO `@livewire()`
- [ ] **YES** CMS JSON con `"type": "widget"`
- [ ] **YES** php -l, phpstan, phpmd passati

**Se manca anche solo uno**: ❌ NON COMMITARE!

---

## 🧘 FILOSOFIA ZEN

> "Il modulo è come un albero:  
> Le radici sono la logica (Filament Widgets),  
> I frutti sono i dati (Models),  
> Il tema è il vestito che indossano i frutti (blade views).  
> Non confondere mai le radici con il vestito."

**Principi**:
1. **Modularità**: Moduli forniscono, Temi consumano
2. **Riutilizzo**: Scrivi 1 volta, usa 10 volte
3. **Testing**: Livewire test helpers
4. **Consistency**: Stesso pattern ovunque
5. **Manutenibilità**: Aggiorni 1 volta, non 10

---

## 📚 RIFERIMENTI

### Project Documentation
- `docs/project/FILAMENT_WIDGETS_FOR_LISTS_RULE.md`
- `docs/project/FILAMENT_WIDGETS_ARCHITECTURE.md`
- `docs/project/FILAMENT_ZEN_PHILOSOPHY.md`

### Filament Documentation
- [Table Widgets](https://filamentphp.com/docs/5.x/widgets/overview#table-widgets)
- [Tables Overview](https://filamentphp.com/docs/5.x/tables/overview)

### Esempi Reali
<<<<<<< .merge_file_q4i0MX
- `Modules/Predict/Filament/Widgets/PredictTableWidget.php`
- `Themes/TwentyOne/resources/views/filament/widgets/predict-table.blade.php`
- `config/local/predict/database/content/pages/predicts.index.json`
=======
<<<<<<< .merge_file_eNNsdE
- `Modules/Predict/Filament/Widgets/PredictTableWidget.php`
- `Themes/TwentyOne/resources/views/filament/widgets/predict-table.blade.php`
- `config/local/predict/database/content/pages/predicts.index.json`
=======
>>>>>>> .merge_file_qPmxBx
- `Modules/Forecast/Filament/Widgets/ForecastTableWidget.php`
- `Themes/TwentyOne/resources/views/filament/widgets/forecast-table.blade.php`
- `config/local/forecast/database/content/pages/forecasts.index.json`
>>>>>>> .merge_file_As3mQv

---

**Ultimo Aggiornamento**: 2026-03-20  
**Stato**: ✅ CRITICAL RULE  
**Severità**: OBBLIGATORIO - SEMPRE
