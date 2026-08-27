# GitHub Issues - CORRECT WORKFLOW

**CRITICAL RULE**: GitHub Issues e Discussions si creano **ONLINE** su GitHub, NON come file locali!

---

## Repository

<<<<<<< .merge_file_ohOdkf
- **URL**: https://github.com/laraxot/base_predict_fila5
- **Remote**: `origin` (git@github.com:laraxot/base_predict_fila5.git)
=======
<<<<<<< .merge_file_I8dvFU
- **URL**: https://github.com/laraxot/base_predict_fila5
- **Remote**: `origin` (git@github.com:laraxot/base_predict_fila5.git)
=======
>>>>>>> .merge_file_xl16De
- **URL**: https://github.com/laraxot/base_ptvx_fila5
- **Remote**: `origin` (git@github.com:laraxot/base_ptvx_fila5.git)
>>>>>>> .merge_file_Cd6cFJ

---

## ✅ CORRECT: Create Issues Online

### Method 1: GitHub Web Interface

```
<<<<<<< .merge_file_ohOdkf
1. Vai su: https://github.com/laraxot/base_predict_fila5/issues
=======
<<<<<<< .merge_file_I8dvFU
1. Vai su: https://github.com/laraxot/base_predict_fila5/issues
=======
>>>>>>> .merge_file_xl16De
1. Vai su: https://github.com/laraxot/base_ptvx_fila5/issues
>>>>>>> .merge_file_Cd6cFJ
2. Clicca "New issue"
3. Scegli template
4. Compili e invii
```

### Method 2: GitHub CLI

```bash
# Login (prima volta)
gh auth login

# Crea issue
gh issue create --title "Bug: ..." --body "..."

# Crea discussion
gh discussion create --title "..." --body "..."
```

---

## ❌ WRONG: NEVER Do This

```bash
# NO creare file markdown locali
echo "# Bug" > .github/ISSUES/001-bug.md  ← SBAGLIATO!

# NO pensare che file locali = issue GitHub
git add .github/ISSUES/  ← INUTILE!
```

---

## Why Online?

1. ✅ **Tracciabilità** - Link diretti, notifiche, menzioni
2. ✅ **Collaborazione** - Commenti, reaction, assignee
3. ✅ **Integration** - Si collega a PR, commit, project board
4. ✅ **Search** - Ricerca full-text, filtri, label
5. ✅ **Automation** - GitHub Actions, bots, auto-close

---

## Local .github/ Folder - ONLY For

- ✅ `ISSUE_TEMPLATE/*.yml` - Template configuration
- ✅ `PULL_REQUEST_TEMPLATE.md` - PR template
- ✅ `workflows/` - GitHub Actions
- ✅ `config.yml` - GitHub configuration
- ✅ `CODEOWNERS` - Code owners

**MAI**:
- ❌ `.github/ISSUES/*.md` (issue locali)
- ❌ `.github/DISCUSSIONS/*.md` (discussion locali)

---

## Quick Commands

```bash
# List issues
gh issue list

# Create issue
gh issue create --title "Fix: ..." --body "..."

# View issue
gh issue view 123

# Comment issue
gh issue comment 123 --body "Fixed!"

# Create PR
gh pr create --title "Fix: ..." --body "Fixes #123"
```

---

## Missing Features - Create Issues

1. ⚡ **Dark Mode Toggle** - HIGH priority
2. 📈 **Advanced Charts (TradingView)** - HIGH priority
3. 💬 **Comments Section** - HIGH priority
4. 📤 **Share Buttons** - MEDIUM priority

<<<<<<< .merge_file_ohOdkf
**Create issues on GitHub**: https://github.com/laraxot/base_predict_fila5/issues
=======
<<<<<<< .merge_file_I8dvFU
**Create issues on GitHub**: https://github.com/laraxot/base_predict_fila5/issues
=======
>>>>>>> .merge_file_xl16De
**Create issues on GitHub**: https://github.com/laraxot/base_ptvx_fila5/issues
>>>>>>> .merge_file_Cd6cFJ

---

**Last Updated**: 2026-03-20  
**Docs**: `docs/project/GITHUB_ISSUES_ONLINE_RULE.md`
