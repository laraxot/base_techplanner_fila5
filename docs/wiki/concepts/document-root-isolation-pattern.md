# Document Root Isolation Pattern (public_html vs laravel/public)

## Context
In this project, the web server's `DocumentRoot` is configured to point to `/var/www/_bases/base_fixcity_fila5/public_html` rather than the standard Laravel path `/var/www/_bases/base_fixcity_fila5/laravel/public`.

## Rationale

### 1. Security (Source Code Protection)
By separating the `laravel/` source directory from the `public_html/` web root, we ensure that:
- **Zero Exposure**: Even in the event of a web server misconfiguration (e.g., `.htaccess` or `.conf` files being ignored), sensitive files like `.env`, `composer.json`, and the entire `storage/` or `logs/` directory are physically located outside the accessible web path.
- **No Path Traversal**: It significantly reduces the surface area for path traversal attacks that attempt to reach configuration files from the public root.

### 2. Standardized Deployment (VHost Compliance)
Many production environments and shared hosting platforms use `public_html` as the default directory for serving content.
- Adopting this naming convention ensures compatibility with standard VHost configurations without requiring custom remapping in every environment.
- It facilitates easier integration with automated deployment scripts that expect a standard `public_html` folder.

### 3. Asset Management (Vite & Bundles)
In our modular architecture, compiled assets (JS/CSS) are built within the modules and then copied to the public root.
- The `npm run copy` commands in modules like `Geo` are configured to target `../../../public_html/assets/...`.
- This ensures a clear separation between the **Source Assets** (inside `laravel/Modules/*/resources/js`) and the **Served Assets** (inside `public_html/assets/`).

## Architectural Advantages

| Advantage | Description |
| :--- | :--- |
| **Atomic Updates** | `public_html` can be a symlink to the current version's public folder, allowing instant rollbacks. |
| **Cleaner Root** | The project root contains only high-level directories, clearly distinguishing between the application core (`laravel/`) and public content (`public_html/`). |
| **Env Security** | The `.env` file is never reachable via URL, as it resides in the application core directory above the web root. |

## References
- [Apache VirtualHost Management](../../skills/devops/vhost-management/SKILL.md)
- [FixCity Deployment Workflow](../../docs/wiki/concepts/deployment-workflow.md)

---
*Created: 2026-04-30 by Antigravity*
