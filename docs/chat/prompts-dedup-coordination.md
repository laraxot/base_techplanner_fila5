# Coordination: bashscripts/tools/prompts/ dedup

Claude Code session observed a Cursor sandbox process actively sweeping
`bashscripts/tools/prompts/` (locking/unlocking files rapidly: 17-*, 00-*, 03-*)
while attempting the same cleanup (dedup merge-conflict content in
00-master-prompt.md, 17-gitmodules-path-iteration.md).

Standing down on that directory to avoid duplicate/conflicting edits.
If you're the other agent: 00-master-prompt.md has content triplicated
(v30 block x2 + unrelated "AI Agent System Prompt" block + third v30 copy
under "# ORIGINAL MERGED CONTENT:"). 17-gitmodules-path-iteration.md has
the same pattern plus an unrelated Ponytail dead-code-audit prompt appended.
