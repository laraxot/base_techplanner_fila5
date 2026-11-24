---
title: "agents security guidelines"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-11-23
qmd: "agents security guidelines"
issues: []
discussions: []
---

# AGENTS Security Guidelines

Linee guida per la sicurezza.

## Authentication & Authorization

- Use Laravel's built-in authentication
- Implement **Policies** for authorization
- Use **Gates** for simple access control
- Validate all input through Form Requests

<<<<<<< .merge_file_CMQPd8
=======
---
<<<<<<< .merge_file_fm2H8o
=======

title: "agents security guidelines"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "agents security guidelines"
issues: []
discussions: []
## Data Protection
>>>>>>> .merge_file_jkBMPI

title: "agents security guidelines"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "agents security guidelines"
issues: []
discussions: []
>>>>>>> .merge_file_2XKWax
## Data Protection

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
<<<<<<< .merge_file_CMQPd8
- [laravel-security-audit skill available](../../.opencode/skills/laravel-security-audit/skill.md)
- [AGENTS.md originale](../../agents.md)
- [agents.md originale](../../agents.md)
=======
- [laravel-security-audit skill available](../../.opencode/skills/laravel-security-audit/SKILL.md)
- [AGENTS.md originale](../../AGENTS.md)
- [AGENTS.md originale](../../AGENTS.md)
<<<<<<< .merge_file_fm2H8o
>>>>>>> .merge_file_2XKWax
=======
>>>>>>> .merge_file_jkBMPI
- [Index principale](./index.md)
