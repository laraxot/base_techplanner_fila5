# Story: Full PHPStan pass on all Modules
Status: backlog
Scope: All Modules
Context: PHPStan analyse on all Modules shows: 3 errors remaining (Activity constantTypeCoverage, Employee argument.type). Need full pass on ALL modules to ensure zero errors.
Dependencies: gdpr-sync-phpstan-complete, activity-constant-type-coverage-fix, cms-merge-conflict-resolution
Accept Criteria: ./vendor/bin/phpstan analyse Modules returns 0 errors. Each module gets quality gate + git sync.
Owner: AI Agent (BMAD sprint)
