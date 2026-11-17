---
title: "testing"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "testing"
issues: []
discussions: []
<<<<<<< HEAD
status: draft
=======
>>>>>>> laraxot/dev
---

# Testing Guide

<<<<<<< HEAD
> Guida completa per i test in PTVX fila5.
=======
> Guida completa per i test in PTVX Fila5 Mono.
>>>>>>> laraxot/dev

## 🧪 Testing con Pest

### Comandi Base
```bash
# Test singolo per nome
./vendor/bin/pest --filter="test_name"

# Test singolo file
./vendor/bin/pest tests/Feature/UserTest.php

# Test modulo
./vendor/bin/pest Modules/Xot/tests

# Coverage
./vendor/bin/pest --coverage
```

## 📋 Regola Assoluta DB Test

**NEI TEST È SEMPRE VIETATO USARE:**
- `RefreshDatabase`
- `php artisan migrate:fresh`
- `php artisan migrate --force`

**Usare approcci non distruttivi:**
- Transazioni per isolamento
- Fixture mirate
- Setup personalizzato senza reset schema

## 🎯 Pattern AAA (Arrange-Act-Assert)

```php
it('creates user successfully', function () {
    // ARRANGE
    $data = UserData::factory()->make();
<<<<<<< HEAD

    // ACT
    $user = CreateUserAction::execute($data);

=======
    
    // ACT
    $user = CreateUserAction::execute($data);
    
>>>>>>> laraxot/dev
    // ASSERT
    expect($user)->toBeInstanceOf(User::class);
});
```

## 🔗 Link

**Di ritorno:**
- → [AGENTS.md - Testing Patterns](../../AGENTS.md#testing-patterns)
- → [agents.md - Testing Patterns](../../agents.md#testing-patterns)
<<<<<<< HEAD
- → [AGENTS.md - Testing Patterns](../AGENTS.md#testing-patterns)
- → [agents.md - Testing Patterns](../agents.md#testing-patterns)
=======
>>>>>>> laraxot/dev
- → [AGENT_MEMORY.md - Testing Patterns](../../AGENT_MEMORY.md#-testing-validation-patterns)
- → [commands.md](commands.md)
- → [INDEX](index.md)
