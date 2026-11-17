# Regola Naming: Nomi Modelli al Singolare

## Regola
I nomi dei modelli Eloquent **DEVONO** essere al **singolare**, mai al plurale.

## Perché
In Laravel/Eloquent, un modello rappresenta una singola entità/record. La convenzione framework richiede:
- **Modello**: Nome singolare (`User`, `Post`, `Scheda`)
- **Tabella**: Nome plurale (`users`, `posts`, `schede`)

## Esempi

### ✅ Corretto
```php
class Scheda extends BaseModel
{
    protected $table = 'schede'; // tabella rimane plurale
}
```

### ❌ Errato
```php
class Schede extends BaseModel  // plurale - VIETATO
```

## Checklist
- [ ] Nome file al singolare (`Scheda.php`)
- [ ] Nome classe al singolare (`class Scheda`)
- [ ] Tabella database al plurale (`schede`)
- [ ] Factory: `SchedaFactory`
- [ ] Policy: `SchedaPolicy`

## Riferimenti
- [Model Naming Convention](../../docs/MODEL_NAMING_CONVENTION.md)
- [Laravel Eloquent Conventions](https://laravel.com/docs/eloquent#eloquent-model-conventions)

---
Data: 2026-03-10
