### CRITICAL: Execute, Don't Describe

You MUST actually call tools. Never describe or simulate what you would do.

❌ FORBIDDEN (faking tool use):

- "Here's the code you need:" followed by a code block
- "I've created the file with..." without calling write_file
- "The file now contains..." without calling edit_file
- "Running the command would show..." without calling shell
- Showing example output instead of real output
- Describing what a tool call would return

✅ REQUIRED (real tool use):

- Call write to create files, then show tool result
- Call edit to modify code, then show tool result
- Call bash to run commands, then show actual output
- Call read to see contents, then quote from result
- Call grep to search file contents using regular expressions
- Call glob to find files by pattern matching
- Call list to list files and directories in a given path
- Call lsp to interact with your configured LSP servers to get code intelligence features like definitions, references, hover info, and call hierarchy
- Call patch to apply patches to files
- Call todowrite to manage todo lists during coding sessions
- Call todoread to read existing todo lists
- Call webfetch to fetch web content
- Call question to ask the user questions during execution

If you describe code without calling tools, you are lying about doing work.

Self-check before responding:

- Did I CALL tools or just DESCRIBE what I would do?
- Is there a code block that should be a write/edit call?
- Am I showing real tool output or imagined output?

---

### CRITICAL: Senior Developer Workflow

When given a bug to fix or a task to complete, ALWAYS follow this workflow:

#### 1. Study First
- Read docs in affected module/theme folders
- Study git history (forward-only - NEVER restore old versions)
- Understand the purpose - what does this feature/component do?
- Check remote: `git remote -v` for repository info

#### 2. Think & Reason
- Analyze the root cause, not just symptoms
- Plan the minimal fix needed
- Consider implications on other parts

#### 3. Update Your Knowledge
- Update docs in affected modules/themes
- Update your rules, memories, skills
- Create/update GitHub issues and GitHub Actions if needed

#### 4. Apply Fix
- Make the minimal necessary change
- Follow project conventions (XotBase, translations, etc.)

#### 5. Verify & Quality Gates
- Run phpstan
- Run phpmd
- Run phpinsights
- Create/update Pest test (NEVER use migrate:fresh or DatabaseRefresh)

#### 6. Commit & Push
- Only after ALL quality gates pass
- git commit + git push

**Key Rules:**
- Git: Forward-only (study history but never checkout/reset/revert)
- Git remote: Always check `git remote -v` to know the repository
- Docs-first: Read docs before modifying code
- Tests: Always Pest, never migrate:fresh
- Quality gates: phpstan + phpmd + phpinsights after EVERY .php change
- Token efficiency: Use Ollama for local tasks (see skill ollama-token-optimization)
- NO Services: Use Spatie laravel-queueable-action instead of Service classes
- Filament layout: Use columns(2) for filter forms with 4 fields, NOT columns(4) (too cramped) or columns(1) (stacked)
- Ollama vision: Use llava or qwen2-vl for image analysis, NOT qwen2.5-coder (no vision support)
- AI module: AI actions (Ollama, Chat, Generate) MUST be in Modules/AI, NOT in User module
