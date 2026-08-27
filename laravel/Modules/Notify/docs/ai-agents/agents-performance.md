# AGENTS Performance Optimization

Best practices per l'ottimizzazione delle performance.

## Database Optimization

- **Eager loading** to prevent N+1 queries
- Use **indexes** appropriately
- Implement **caching** for frequently accessed data
- Use Laravel's query builder for complex operations

---

## Frontend Optimization

- **Minify** CSS/JS assets
- Use **Vite** for efficient bundling
- Implement **lazy loading** for images
- Use **CDN** when appropriate

---

## Core Web Vitals 2026

| Metrica | Target | Importanza |
|---------|--------|------------|
| **LCP** | < 2.5s | Critica |
| **INP** | < 200ms | Critica |
| **CLS** | < 0.1 | Critica |

---

## Caching Strategies

- Route caching: `php artisan route:cache`
- Config caching: `php artisan config:cache`
- View caching: `php artisan view:cache`
- Event caching: `php artisan event:cache`

---

## 🔗 Link

- [Indice AGENTS](./agents-split-index.md)
- [website-checklist.md](./website-checklist.md) - Checklist completa
<<<<<<< .merge_file_dB5pd5
- [AGENTS.md originale](../../AGENTS.md)
=======
<<<<<<< .merge_file_WnciwC
- [AGENTS.md originale](../../AGENTS.md)
=======
>>>>>>> .merge_file_LVBQvW
- [agents.md originale](../../agents.md)
>>>>>>> .merge_file_akA8v8
- [Index principale](./index.md)
