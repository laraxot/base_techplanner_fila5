# Configurazione MCP per Claude Code

## Panoramica

<<<<<<< HEAD
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto healthcare_app Fila4 Mono.
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto.
=======
Claude Code utilizza comandi CLI per configurare i server MCP. Questa guida descrive come configurare i server MCP per il progetto Quaeris Fila4 Mono.
>>>>>>> 6ed19256f (.)

## Prerequisiti

- Claude Code installato e configurato
- Accesso al terminale
- Variabili d'ambiente del database configurate

## Configurazione Server MCP

### 1. Filesystem Server

Permette l'accesso ai file del progetto.

```bash
<<<<<<< HEAD
claude mcp add --transport http filesystem-healthcare_app http://localhost:8000/mcp/filesystem
claude mcp add --transport http filesystem http://localhost:8000/mcp/filesystem
=======
claude mcp add --transport http filesystem-quaeris http://localhost:8000/mcp/filesystem
>>>>>>> 6ed19256f (.)
```

**Nota**: Richiede un server MCP HTTP in esecuzione. Per sviluppo locale, utilizzare server STDIO invece.

### 2. Fetch Server

Permette chiamate HTTP e API.

```bash
<<<<<<< HEAD
claude mcp add --transport http fetch-healthcare_app http://localhost:8000/mcp/fetch
=======
claude mcp add --transport http fetch-quaeris http://localhost:8000/mcp/fetch
>>>>>>> 6ed19256f (.)
```

### 3. Memory Server

Memoria temporanea per contesto tra richieste.

```bash
<<<<<<< HEAD
claude mcp add --transport http memory-healthcare_app http://localhost:8000/mcp/memory
=======
claude mcp add --transport http memory-quaeris http://localhost:8000/mcp/memory
>>>>>>> 6ed19256f (.)
```

### 4. MySQL Server

Interazione con database MySQL.

```bash
<<<<<<< HEAD
claude mcp add --transport http mysql-healthcare_app http://localhost:8000/mcp/mysql
=======
claude mcp add --transport http mysql-quaeris http://localhost:8000/mcp/mysql
>>>>>>> 6ed19256f (.)
```

**Variabili d'ambiente richieste**:
- `DB_HOST`: Host del database (default: localhost)
- `DB_PORT`: Porta del database (default: 3306)
- `DB_USERNAME`: Username del database
- `DB_PASSWORD`: Password del database
- `DB_DATABASE`: Nome del database

### 5. Sequential Thinking Server

Analisi codice e ottimizzazione.

```bash
<<<<<<< HEAD
claude mcp add --transport http sequential-thinking-healthcare_app http://localhost:8000/mcp/sequential-thinking
=======
claude mcp add --transport http sequential-thinking-quaeris http://localhost:8000/mcp/sequential-thinking
>>>>>>> 6ed19256f (.)
```

## Configurazione con Server STDIO (Raccomandato)

Per sviluppo locale, è preferibile utilizzare server STDIO invece di HTTP:

### Filesystem con STDIO

```bash
<<<<<<< HEAD
claude mcp add filesystem-healthcare_app npx -y @modelcontextprotocol/server-filesystem server-memory
=======
claude mcp add filesystem-quaeris npx -y @modelcontextprotocol/server-filesystem /var/www/_bases/base_quaeris_fila4_mono
```

### Memory con STDIO

```bash
claude mcp add memory-quaeris npx -y @modelcontextprotocol/server-memory
>>>>>>> 6ed19256f (.)
```

### MySQL con STDIO

```bash
<<<<<<< HEAD
claude mcp add mysql-healthcare_app npx -y @modelcontextprotocol/server-mysql
=======
claude mcp add mysql-quaeris npx -y @modelcontextprotocol/server-mysql
>>>>>>> 6ed19256f (.)
```

**Con variabili d'ambiente**:
```bash
export DB_HOST=localhost
export DB_PORT=3306
export DB_USERNAME=your_username
export DB_PASSWORD=your_password
export DB_DATABASE=your_database

<<<<<<< HEAD
claude mcp add mysql-healthcare_app npx -y @modelcontextprotocol/server-mysql
=======
claude mcp add mysql-quaeris npx -y @modelcontextprotocol/server-mysql
>>>>>>> 6ed19256f (.)
```

## Gestione Server

### Lista Server Configurati

```bash
claude mcp list
```

### Rimozione Server

```bash
<<<<<<< HEAD
claude mcp remove filesystem-healthcare_app
=======
claude mcp remove filesystem-quaeris
>>>>>>> 6ed19256f (.)
```

### Test Connessione

```bash
<<<<<<< HEAD
claude mcp test filesystem-healthcare_app
=======
claude mcp test filesystem-quaeris
>>>>>>> 6ed19256f (.)
```

## Configurazione Avanzata

### Server Personalizzati

Per server MCP personalizzati, creare uno script wrapper:

```bash
#!/bin/bash
<<<<<<< HEAD
# ~/bin/mcp-mysql-healthcare_app.sh
=======
# ~/bin/mcp-mysql-quaeris.sh
>>>>>>> 6ed19256f (.)

export MYSQL_HOST="${DB_HOST:-localhost}"
export MYSQL_PORT="${DB_PORT:-3306}"
export MYSQL_USER="${DB_USERNAME}"
export MYSQL_PASSWORD="${DB_PASSWORD}"
export MYSQL_DATABASE="${DB_DATABASE}"

exec npx -y @modelcontextprotocol/server-mysql
```

Poi aggiungere il server:

```bash
<<<<<<< HEAD
chmod +x ~/bin/mcp-mysql-healthcare_app.sh
claude mcp add mysql-healthcare_app ~/bin/mcp-mysql-healthcare_app.sh
=======
chmod +x ~/bin/mcp-mysql-quaeris.sh
claude mcp add mysql-quaeris ~/bin/mcp-mysql-quaeris.sh
>>>>>>> 6ed19256f (.)
```

## Troubleshooting

### Server non si connette

1. Verificare che il comando sia installato:
   ```bash
   npx -y @modelcontextprotocol/server-filesystem --version
   ```

2. Controllare permessi file:
   ```bash
<<<<<<< HEAD
   ls -la /docs.anthropic.com/claude/docs/mcp)
- [Model Context Protocol Specification](https://modelcontextprotocol.io)
- [MCP Editors Configuration](../mcp-editors-configuration.md)
=======
   ls -la /var/www/_bases/base_quaeris_fila4_mono
   ```

3. Verificare variabili d'ambiente:
   ```bash
   echo $DB_HOST
   echo $DB_USERNAME
   ```

### Errori di autenticazione database

1. Testare connessione manuale:
   ```bash
   mysql -h $DB_HOST -P $DB_PORT -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE
   ```

2. Verificare credenziali nel file `.env`:
   ```bash
   grep DB_ /var/www/_bases/base_quaeris_fila4_mono/laravel/.env
   ```

## Best Practices

1. **Utilizzare nomi descrittivi**: Prefissare i nomi server con il progetto (es. `filesystem-quaeris`)
2. **Variabili d'ambiente**: Mai hardcodare credenziali nei comandi
3. **Test regolari**: Verificare periodicamente che i server funzionino
4. **Documentazione**: Mantenere questa documentazione aggiornata

## Riferimenti

- [Claude Code MCP Documentation](https://docs.anthropic.com/claude/docs/mcp)
- [Model Context Protocol Specification](https://modelcontextprotocol.io)
- [MCP Editors Configuration](../mcp-editors-configuration.md)
>>>>>>> 6ed19256f (.)
