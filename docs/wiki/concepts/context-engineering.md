---
type: concept
created: 2026-05-04
tags: [context, engineering, tokens, mcp, compaction]
status: active
---

# Context Engineering Discipline

Context Engineering is the practice of optimizing the utility of the LLM's finite context window. In this project, we prioritize high-signal tokens and systematic compaction.

## Operational Rules
1. **Compaction First:** Systematically summarize conversation history when context reaches 80% capacity (approx. 100k-120k tokens).
2. **JIT Retrieval:** Leverage `qmd` and `grep` to pull only the "essence" of files. Avoid full-file reads unless doing a surgical edit.
3. **Agentic Memory Persistence:** Use `NOTES.md` and `sprint-status.yaml` to store dynamic state that survives session restarts.
4. **Context Sandboxing:** Use **Context Mode (MCP)** to process high-volume tool data (logs, directory listings) and return only synthesized summaries.
5. **Sub-agent Delegation:** Delegate repetitive batch tasks (linting, tests) to sub-agents to keep the main orchestrator lean.

## Tools
- **qmd:** Hybrid search across the Second Brain.
- **context-mode:** Structured tool output filtering.

## Related
- [[bmad-method-overview]]
- [[llm-wiki-pattern]]

## References
- [Source Article](../raw/articles/2026-05-04-context-engineering.md)
