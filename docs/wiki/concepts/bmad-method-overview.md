---
type: concept
created: 2026-05-04
tags: [bmad, methodology, architecture, planning]
status: active
---

# BMAD Method V6: Architecture-First Engineering

The BMAD Method (V6) is the standard for AI-assisted engineering in this project. It prioritizes a document-driven approach to build complex software through progressive context enrichment.

## Core Pillars
1. **Architecture-First Planning:** Technical designs (DB, APIs, ADRs) are finalized *before* stories are created. This ensures implementation is informed by structural constraints.
2. **Phase-Gated Workflows:** Work progresses through Analysis, Planning, Solutioning, and Implementation. Each phase produces immutable context for the next.
3. **Atomic Story Implementation:** Building story-by-story with mandatory automated validation (tests) for each change.
4. **Persona Continuity:** Using specialized agent roles (Winston/Architect, Amelia/Dev) to maintain persona-driven context and decision quality.

## Principles of Execution
- **Fresh Context:** Start new sessions for major sub-tasks to prevent "context rot" and merge marker pollution.
- **Adversarial Review:** Every plan must undergo a cynical review to identify hidden risks or architectural violations.
- **Validation-Driven:** No feature is "done" without verification in the target environment.

## Related
- [[context-engineering-discipline]]
- [[llm-wiki-pattern]]

## References
- [Source Article](../raw/articles/2026-05-04-bmad-method-v6.md)
