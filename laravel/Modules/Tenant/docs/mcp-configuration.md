# MCP Server Configuration - Tenant Module


**Status**: ✅ Configured
**MCP Servers**: Asana, ClickUp, Filesystem, Database, Redmine (Planned)

---

## 📋 Overview

The Tenant module's MCP configuration enables AI assistants to interact with:
- **Asana Work Graph** - Task and project management
- **ClickUp Workspace** - Advanced task workflows and time tracking
- **Redmine** - Project management (planned, requires self-hosted instance)
- **Filesystem** - Direct file access
- **Database** - SQLite queries for data inspection

---

## 🔧 Configuration

### Active MCP Servers

```json
{
  "mcpServers": {
    "asana": {
      "command": "npx",
      "args": ["mcp-remote", "https://mcp.asana.com/sse"],
      "description": "Asana Work Graph integration"
    },
    "clickup": {
      "command": "npx",
      "args": ["-y", "mcp-remote", "https://mcp.clickup.com/mcp"],
      "description": "ClickUp workspace integration"
    },
    "filesystem": {
      "command": "npx",
<<<<<<< HEAD
      "args": ["-y", "@modelcontextprotocol/server-filesystem", "/var/www/_bases/base_laravelpizza/laravel"],
=======
      "args": ["-y", "@modelcontextprotocol/server-filesystem", "/var/www/_bases/base_<nome progetto>/laravel"],
>>>>>>> dev
      "description": "Access to Tenant module files"
    },
    "database": {
      "command": "npx",
      "args": ["-y", "@bytebase/dbhub"],
      "env": {
<<<<<<< HEAD
        "DATABASE_URL": "sqlite:///var/www/_bases/base_laravelpizza/laravel/database/database.sqlite"
=======
        "DATABASE_URL": "sqlite:///var/www/_bases/base_<nome progetto>/laravel/database/database.sqlite"
>>>>>>> dev
      },
      "description": "SQLite database queries"
    }
  }
}
```

---

## 🚀 Usage Examples

### Asana Integration
```bash
# Create task
<<<<<<< HEAD
"Create task in 'LaravelPizza - Tenant Module' project: 'Test data isolation between tenants'"
=======
"Create task in '<nome progetto> - Tenant Module' project: 'Test data isolation between tenants'"
>>>>>>> dev

# Update status
"Update task 'Reduce PHPStan test suppressions' status to 'In Progress'"

# Log time
"Log 3 hours on task 'Consolidate documentation'"
```

### ClickUp Integration
```bash
# Create task
"Create task in 'Tenant Development' space: 'Test data isolation between tenants'"

# Update status
"Update task 'Reduce PHPStan test suppressions' status to 'In Progress'"

# Log time
"Log 3 hours on task 'Consolidate documentation'"
```

### Redmine Integration (Planned)
```bash
# Create issue
"Create issue in project 'Tenant Module': task 'Test data isolation between tenants' (Priority: High)"
```

---

## 📊 MCP Servers Comparison

| Server | Status | Auth | Best For |
|--------|--------|------|----------|
| **Asana** | ✅ Active | OAuth | Established workflows |
| **ClickUp** | ✅ Active | OAuth | Time tracking, reports |
| **Redmine** | 🔄 Planned | API Key | Self-hosted, custom workflows |
| **Filesystem** | ✅ Active | N/A | Direct file access |
| **Database** | ✅ Active | N/A | Schema inspection |

---

## 📝 Best Practices

1. **Task Naming Convention**: Include module prefix `[Tenant]`
2. **Tagging**: Use consistent tags across platforms
3. **Use Asana for**: Established workflows, team collaboration
4. **Use ClickUp for**: Time tracking, executive reports
5. **Use Redmine for**: Self-hosted requirements (when implemented)

---

## 📚 Related Documentation

<<<<<<< HEAD
- [Asana MCP Configuration](../../../docs/mcp-asana-configuration.md)
- [ClickUp MCP Configuration](../../../docs/mcp-clickup-configuration.md)
- [Redmine MCP Configuration](../../../docs/mcp-redmine-configuration.md)
=======
- [Asana MCP Configuration](../../../../docs/mcp-asana-configuration.md)
- [ClickUp MCP Configuration](../../../../docs/mcp-clickup-configuration.md)
- [Redmine MCP Configuration](../../../../docs/mcp-redmine-configuration.md)
>>>>>>> dev
- [Tenant Module Roadmap](./roadmap-[date].md)

---

## 🔄 Updates

- **[DATE]**: Added ClickUp support
- **[DATE]**: Planned Redmine integration
- **Servers Active**: 4 (Asana, ClickUp, Filesystem, Database)

---

**Module**: Tenant (Multi-tenancy)
**MCP Version**: 2.0.0
**Last Review**: 31 Gennaio 2026