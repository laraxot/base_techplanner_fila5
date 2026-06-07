# Ruflo Agent Orchestration

Status: ✅ Configured and verified (May 8, 2026)

## Install Type

- **CLI install (full loop)**: `npx ruflo@latest init` completed
- Config dirs: `.claude/` + `.claude-flow/`
- MCP server: Running

## Configuration

| Setting | Value |
|---------|-------|
| Version | 3.0.0 |
| Swarm | adaptive topology, max 15 agents, consensus |
| Memory | AgentDB + HNSW, persist in `.claude-flow/data/` |
| Learning | SONA bridge, balanced mode, confidence decay 0.005 |
| Neural | Enabled |
| Hooks | Enabled, auto-execute |
| Plugins | 20 discovered via IPFS registry (none installed) |

## MCP Tools Available

```
Agent:        agent_spawn, agent_execute, agent_terminate, agent_status, agent_list, agent_pool, agent_health, agent_update
Swarm:        swarm_init, swarm_status, swarm_shutdown, swarm_health
Memory:       memory_store, memory_search
```

## Usage

```bash
# Store in memory
npx ruflo@latest memory store --key <key> --value <value>

# Search memory
npx ruflo@latest memory search --query <text>

# Init swarm
npx ruflo@latest swarm init

# Spawn agent
npx ruflo@latest agent spawn --name <name> --type <type>
```

## References

- GitHub: https://github.com/ruvnet/ruflo/
- Web UI: https://flo.ruv.io/
- Goal Planner: https://goal.ruv.io/
- User Guide: https://github.com/ruvnet/ruflo/blob/main/docs/USERGUIDE.md
