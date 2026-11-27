# .harness/tasks — nessun Task Contract duplicato

In questo repository **non** esistono Task Contract `T-NNN` separati: il
perimetro del lavoro (scope, file, verifica) è la **story BMAD** del modulo o
tema owner, in `laravel/Modules/<M>/docs/stories/` o
`laravel/Themes/<T>/docs/stories/` (canon: ADR Xot `0042` e
`Modules/Xot/docs/adr/0018-agent-harness.md`).

Regola pratica:

- Task mono-pacchetto → story BMAD nel `docs/stories/` del pacchetto.
- Task trasversale o sprovvisto di owner → `bmad-output/` o issue GitHub.
- Le approval_required (migrazioni, dipendenze nuove) si chiedono con
  `[ATTESA-UMANO]: <domanda>` nel messaggio, non servono file di permesso.

Questo file esiste per evitare che un agente ricrei qui il formato `T-NNN`
del workshop: non è la convenzione di questo repo.
