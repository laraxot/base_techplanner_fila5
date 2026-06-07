# GitHub Bot Integration - Documentazione

## Obiettivo
Permettere a Cascade AI di interagire su GitHub Discussions come utente "bot" diverso dall'utente principale, evitando che tutti i commenti appaiano sotto un solo nome.

## Approccio 1: GitHub Actions (Consigliato)

Questo è il metodo più semplice e non richiede registrazione di app esterne. I commenti appariranno come eseguiti da "GitHub Actions" (bot ufficiale).

### Workflow per Discussion Comments

```yaml
# .github/workflows/discussion-bot.yml
name: Cascade AI Discussion Bot

on:
  # Triggers manuali o su eventi specifici
  workflow_dispatch:
    inputs:
      discussion_id:
        description: 'Discussion ID to comment on'
        required: true
      comment_body:
        description: 'Comment content'
        required: true

jobs:
  post-comment:
    runs-on: ubuntu-latest
    permissions:
      discussions: write
      contents: read
    
    steps:
      - name: Post comment to discussion
        uses: wesleyscholl/create-discussion-comment@v1.0.18
        with:
          discussion-id: ${{ github.event.inputs.discussion_id }}
          body: |
            🤖 **Cascade AI Bot**
            
            ${{ github.event.inputs.comment_body }}
            
            ---
            *Automated response | LaravelPizza Project*
        env:
          GITHUB_TOKEN: ${{ secrets.GITHUB_TOKEN }}
```

### Uso Manuale da Cascade

1. Cascade prepara il testo del commento
2. Utente esegue workflow con `discussion_id` e `comment_body`
3. Il commento appare come "GitHub Actions" bot

### Action Alternative

```yaml
# Usare gh CLI direttamente (più controllo)
- name: Comment with gh CLI
  run: |
    gh discussion comment "${{ inputs.discussion_id }}" --body "${{ inputs.comment_body }}"
  env:
    GITHUB_TOKEN: ${{ secrets.GITHUB_TOKEN }}
    GH_REPO: ${{ github.repository }}
```

## Approccio 2: GitHub App (Avanzato)

Per avere un bot con nome personalizzato (es. "windsurf-bot"):

### Step 1: Creare GitHub App

1. Vai su GitHub → Settings → Developer settings → GitHub Apps → New GitHub App
2. Configura:
   - **Name**: `windsurf-bot` (o nome desiderato)
   - **Homepage URL**: `https://laravelpizza.com`
   - **Permissions**:
     - Discussions: Read & Write
     - Issues: Read & Write
     - Pull requests: Read & Write
   - **Subscribe to events**: Discussion comment created

### Step 2: Installare App

1. Genera **Private Key** (download .pem)
2. Installa app nel repository `laraxot/laravelpizza.com`
3. Ottieni **App ID** e **Installation ID**

### Step 3: Workflow con GitHub App Token

```yaml
name: Windsurf Bot Comment

on:
  workflow_dispatch:
    inputs:
      discussion_id:
        required: true
      comment_body:
        required: true

jobs:
  comment:
    runs-on: ubuntu-latest
    steps:
      - name: Generate App Token
        id: generate_token
        uses: tibdex/github-app-token@v2
        with:
          app_id: ${{ secrets.WINDSURF_BOT_APP_ID }}
          private_key: ${{ secrets.WINDSURF_BOT_PRIVATE_KEY }}
      
      - name: Post comment
        uses: wesleyscholl/create-discussion-comment@v1
        with:
          discussion-id: ${{ inputs.discussion_id }}
          body: ${{ inputs.comment_body }}
        env:
          GITHUB_TOKEN: ${{ steps.generate_token.outputs.token }}
```

Il commento apparirà come: **"windsurf-bot"** (con avatar dell'app)

## Approccio 3: Personal Access Token (PAT)

Creare un account GitHub separato per il bot:

### Setup

1. Crea account GitHub: `windsurf-bot` (o simile)
2. Genera PAT con scope `repo` e `write:discussion`
3. Aggiungi segreto al repository: `WINDSURF_BOT_TOKEN`

### Workflow

```yaml
name: Bot Comment

on:
  workflow_dispatch:
    inputs:
      discussion_id:
        required: true
      comment_body:
        required: true

jobs:
  comment:
    runs-on: ubuntu-latest
    steps:
      - name: Comment as windsurf-bot
        uses: wesleyscholl/create-discussion-comment@v1
        with:
          discussion-id: ${{ inputs.discussion_id }}
          body: ${{ inputs.comment_body }}
        env:
          GITHUB_TOKEN: ${{ secrets.WINDSURF_BOT_TOKEN }}
```

## Comparazione Approcci

| Approccio | Nome Visualizzato | Setup | Costo | Manutenzione |
|-----------|-------------------|-------|-------|--------------|
| GitHub Actions | "github-actions[bot]" | Semplice | Gratis | Zero |
| GitHub App | "tuo-bot-name" | Medio | Gratis | Media |
| PAT Account | "windsurf-bot" | Medio | Gratis | Alta |

## Implementazione Consigliata per LaravelPizza

### Opzione A: GitHub Actions (Immediata)

**Pro**: Zero setup, immediata
**Contro**: Nome generico "GitHub Actions"

```yaml
# .github/workflows/cascade-bot.yml
name: Cascade Bot

on:
  workflow_dispatch:
    inputs:
      discussion_id:
        description: 'Discussion ID'
        required: true
      comment:
        description: 'Commento da postare'
        required: true

jobs:
  post:
    runs-on: ubuntu-latest
    permissions:
      discussions: write
    steps:
      - uses: wesleyscholl/create-discussion-comment@v1.0.18
        with:
          discussion-id: ${{ github.event.inputs.discussion_id }}
          body: |
            🌊 **Cascade AI Assistant**
            
            ${{ github.event.inputs.comment }}
            
            ---
            💡 AI-generated response | [Documentazione](https://laravelpizza.com/docs)
        env:
          GITHUB_TOKEN: ${{ secrets.GITHUB_TOKEN }}
```

### Opzione B: GitHub App "Windsurf" (Personalizzata)

**Pro**: Nome personalizzato, avatar custom
**Contro**: Richiede setup app

```yaml
# .github/workflows/windsurf-bot.yml
name: Windsurf Bot

on:
  workflow_dispatch:
    inputs:
      discussion_id:
        required: true
      comment:
        required: true

jobs:
  post:
    runs-on: ubuntu-latest
    steps:
      - uses: tibdex/github-app-token@v2
        id: token
        with:
          app_id: ${{ secrets.WINDSURF_APP_ID }}
          private_key: ${{ secrets.WINDSURF_PRIVATE_KEY }}
      
      - uses: wesleyscholl/create-discussion-comment@v1
        with:
          discussion-id: ${{ github.event.inputs.discussion_id }}
          body: |
            🌊 **Windsurf AI**
            
            ${{ github.event.inputs.comment }}
            
            ---
            *Powered by Cascade AI*
        env:
          GITHUB_TOKEN: ${{ steps.token.outputs.token }}
```

## Trigger Manuali da Cascade

Cascade può preparare il payload e l'utente esegue:

```bash
# Eseguire workflow da CLI
github workflow run cascade-bot.yml \
  -f discussion_id=188 \
  -f comment="Analisi completata. Ecco i risultati..."
```

Oppure via GitHub UI:
1. Actions → Cascade Bot → Run workflow
2. Inserire `discussion_id` e `comment`
3. Esegui

## Sicurezza

### Secret Necessari

| Secret | Descrizione | Tipo |
|--------|-------------|------|
| `GITHUB_TOKEN` | Auto-generato da Actions | Built-in |
| `WINDSURF_APP_ID` | App ID per GitHub App | Opzionale |
| `WINDSURF_PRIVATE_KEY` | Chiave privata .pem | Opzionale |
| `WINDSURF_BOT_TOKEN` | PAT per account bot | Opzionale |

### Permessi Workflow

```yaml
permissions:
  discussions: write    # Per commentare discussioni
  issues: write       # Per commentare issue
  pull-requests: write # Per commentare PR
```

## Documentazione Correlata

- [GitHub Actions - workflow_dispatch](https://docs.github.com/en/actions/using-workflows/events-that-trigger-workflows#workflow_dispatch)
- [Create Discussion Comment Action](https://github.com/marketplace/actions/create-discussion-comment)
- [GitHub App Authentication](https://docs.github.com/en/developers/apps/building-github-apps/authenticating-with-github-apps)

---

**Data**: 2026-02-19
**Stato**: Draft - Pronto per implementazione
