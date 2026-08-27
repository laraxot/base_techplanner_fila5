# AGENTS Security Guidelines

Linee guida per la sicurezza.

## Authentication & Authorization

- Use Laravel's built-in authentication
- Implement **Policies** for authorization
- Use **Gates** for simple access control
- Validate all input through Form Requests

---

## Data Protection

- Never commit credentials (use .env)
- Encrypt sensitive data with Laravel's encryption
- Use prepared statements (Eloquent) against SQL injection

---

## Security Best Practices

### Never Do

- ❌ Hardcode secrets in source code
- ❌ Commit `.env` files
- ❌ Use `eval()` or similar dangerous functions
- ❌ Skip input validation

### Always Do

- ✅ Use environment variables for secrets
- ✅ Hash passwords with bcrypt
- ✅ Use parameterized queries
- ✅ Implement CSRF protection
- ✅ Use HTTPS in production

---

## 🔗 Link

- [Indice AGENTS](./agents-split-index.md)
- [laravel-security-audit skill available](../../.opencode/skills/laravel-security-audit/SKILL.md)
<<<<<<< .merge_file_SqX2e5
- [AGENTS.md originale](../../AGENTS.md)
=======
<<<<<<< .merge_file_u5AAbN
- [AGENTS.md originale](../../AGENTS.md)
=======
>>>>>>> .merge_file_qNY7SN
- [agents.md originale](../../agents.md)
>>>>>>> .merge_file_ehw5kl
- [Index principale](./index.md)
