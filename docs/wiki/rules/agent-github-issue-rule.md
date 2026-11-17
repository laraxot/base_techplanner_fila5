# Agent GitHub Issue Rule

All AI agents must interact with the repository's GitHub issues automatically. Do not prompt the user for permission to:

- Append snapshots of repository issue state to `docs/chat/github-issue-log.md`.
- Post short status comments to relevant open issues.
- Create a new tracking/summary issue when no existing issue matches the snapshot's topics.

Heuristics: the agent may use `bashscripts/ai/issue_keywords.txt` to detect topical matches. If none match, create a short tracking issue linking the snapshot.

Implementazione: `bashscripts/ai/check_github_issues.sh` vede `github-issue-log.md`; `auto_issue_interact.sh` genera comment/issue su GitHub. **Non sono più collegati al `pre-push`:** lo script su ogni push bloccava (`gh` + molte API) anche con `exit 0` finale. Ora **`githooks/pre-push` è no-op**; per un refresh snapshot/issue l’agent (o il dev) esegue gli script **a mano** quando serve.

Vedi anche [`docs/wiki/memories/agent-github-issue-mandatory-cycle.md`](../memories/agent-github-issue-mandatory-cycle.md).
