---
description: Logging Performance Best Practices - Critical Rule
---

# Logging Performance Best Practices

## CRITICAL RULE: No Log::info() for Routine Operations

**Severity:** CRITICAL  
**Impact:** 30-50% performance degradation  
**Enforcement:** Mandatory

### The Rule
- **NEVER** use `Log::info()` for routine operations
- **ONLY** use `Log::error()` for actual errors
- **ONLY** use `Log::warning()` for conditions needing attention
- **ONLY** use `Log::debug()` in development (with config check)
- **USE** monitoring tools for performance tracking

### Performance Impact
```
Without excessive logging:    100ms per request
With Log::info() in loops:    3000-5000ms per request  (30-50x slower!)
With proper logging:          100-150ms per request
```

### ❌ WRONG Examples
```php
// ❌ NEVER - Routine operations
Log::info('User logged in', ['user_id' => $id]);
Log::info('Ticket created', ['ticket_id' => $id]);
Log::info('Email sent', ['recipient' => $email]);

// ❌ NEVER - Loop iterations
foreach ($items as $item) {
    Log::info('Processing item', ['item_id' => $item->id]);
}

// ❌ NEVER - Successful completions
Log::info('Task completed successfully');
```

### ✅ CORRECT Examples
```php
// ✅ CORRECT - Actual errors
Log::error('Login failed', ['user_id' => $id, 'reason' => $error]);

// ✅ CORRECT - Warnings
Log::warning('Rate limit exceeded', ['user_id' => $id]);

// ✅ CORRECT - Critical issues
Log::critical('Database connection lost');

// ✅ CORRECT - Debug only in development
if (config('app.debug')) {
    Log::debug('Processing item', ['item_id' => $item->id]);
}
```

### Monitoring Alternatives
Use these instead of logging:
1. **Laravel Pulse** - Real-time monitoring
2. **Laravel Telescope** - Request inspection (dev only)
3. **Sentry** - Error tracking
4. **New Relic** - APM
5. **DataDog** - Infrastructure monitoring

### Implementation
1. Remove all `Log::info()` for routine operations
2. Keep only `Log::error()` and `Log::warning()`
3. Add `Log::debug()` where needed (with config check)
4. Set up proper monitoring tools
5. Verify performance improvement

### Motivation
- **Performance:** Disk I/O and file locking cause 30-50% slowdown
- **Clarity:** Excessive logs make actual errors hard to find
- **Resources:** Reduces memory usage and disk space
- **Scalability:** Critical for high-traffic applications

### Related
- [Logging Best Practices](../../docs/logging-best-practices.md)
- [Performance Optimization](../../docs/performance-optimization.md)
