# Common Patterns

## Skeleton Projects

When implementing new functionality:
1. Search for battle-tested skeleton projects
2. Use parallel agents to evaluate options:
   - Security assessment
   - Extensibility analysis
   - Relevance scoring
   - Implementation planning
3. Clone best match as foundation
4. Iterate within proven structure

## Design Patterns

### Actions Over Services (ABSOLUTE RULE)

**NEVER create Service classes. Business logic ALWAYS lives in QueueableActions.**

```php
// FORBIDDEN
namespace Modules\Quaeris\Services;
class ReportService { ... }

// MANDATORY
namespace Modules\Quaeris\Actions;
use Spatie\QueueableAction\QueueableAction;

class GenerateReportAction
{
    use QueueableAction;

    public function execute(SurveyPdf $pdf): void { ... }
}
```

- Standard project pattern: `Spatie\QueueableAction\QueueableAction` v2.17.0.
- Prefer `execute()` as the public entrypoint (not `__invoke()`).
- Constructor injection is allowed and supported by the package.
- Use `onQueue()` when the same action must run asynchronously — no separate Job class needed.
- Use `Spatie\QueueableAction\ActionJob` when chaining queued actions.
- If configuration is needed, remember the package reads `config('queuableaction.*')`.
- Naming: `{Verb}{Noun}Action` — e.g., `GenerateReportAction`, `SendNotificationAction`.
- Location: `Modules/{ModuleName}/Actions/`.
- ServiceProviders (`XotBaseServiceProvider`, `AdminPanelProvider`) are framework infrastructure — NOT Service classes, keep them as-is.
- Existing legacy services in `Modules/Xot/app/Services/` and `Modules/Job/app/Services/` are framework-level wrappers — do not remove, but do not add new ones.
- Full reference: `.claude/docs/spatie-queueable-action.md`.

### History-First Runtime Repairs

- For new regressions in Filament pages, inspect git history first to recover the last known working pattern, then reimplement forward-only.
- Do not stop at the first stack-frame symptom: inspect the page, its Blade view, the DTO/data object, and any downstream actions/widgets in the same execution path.
- When a custom Blade page renders `{{ $this->filtersForm }}`, the corresponding page class must use `HasFiltersForm`; otherwise the view/page contract is broken even if a `filtersForm()` method exists.
- After history study, rebuild corrupted PHP files manually instead of reverting commits.

### Token-Efficient Execution

- Keep static instructions stable and place them before highly variable input to maximize cache hits.
- Put volatile logs, pasted stack traces, and user-specific data as late as possible in prompts.
- Ask for the minimum acceptable output shape and length.
- Prefer one well-scoped request over several serial requests when the result can be returned together.
- Do deterministic cleanup, filtering, parsing, and formatting with local tools instead of the model.
- Use lower reasoning/verbosity defaults unless the task clearly needs deeper analysis.

### Filament 5 Schema — Filter Form Layout

When building a horizontal filter bar in a Filament 5 Dashboard page with `HasFiltersForm`:

**Root cause of vertical stacking**: `->columns(N)` with an integer maps to `['lg' => N]` — only applies at `lg` breakpoint. If the Section is narrow (e.g., 1/4 page width), default = 1 column → fields stack.

**Root cause of 1/4 width**: Dashboard with `getColumns()` → filtersForm Schema inherits those columns. Section without `->columnSpanFull()` takes 1 column = 1/4 width.

**Correct pattern:**
```php
public function filtersForm(Schema $schema): Schema
{
    return $schema->components([
        Section::make()
            ->schema($this->filters_data->getFiltersFormArray())
            ->columns(['default' => 4])   // 'default' key forces N columns at ALL breakpoints
            ->columnSpanFull(),            // spans all columns of parent Schema
    ]);
}
```

Rules:
- NEVER use `->columns(int)` for horizontal form layouts — use `->columns(['default' => N])`
- ALWAYS pair `->columns(['default' => N])` with `->columnSpanFull()` for filter bars
- The `->columns(int)` shorthand maps to `['lg' => N]` which only applies at ≥1024px breakpoint

### Repository Pattern

Encapsulate data access behind a consistent interface:
- Define standard operations: findAll, findById, create, update, delete
- Concrete implementations handle storage details (database, API, file, etc.)
- Business logic depends on the abstract interface, not the storage mechanism
- Enables easy swapping of data sources and simplifies testing with mocks

### API Response Format

Use a consistent envelope for all API responses:
- Include a success/status indicator
- Include the data payload (nullable on error)
- Include an error message field (nullable on success)
- Include metadata for paginated responses (total, page, limit)
