# Icon Management Architecture (Laraxot)

## Philosophy & Religion
In the Laraxot framework, icons are treated as shared, versioned assets. Hardcoding SVG path data in Blade files is a VIOLATION of the core methodology. 

### The Icon Religion: Symbolic Minimalism
1. **Symbolic vs. Literal**: Icons and logos must be **symbolic/abstract**, not literal pictures. (Example: A pizza logo should be a stylized geometric representation, not a detailed drawing).
2. **Premium Feel**: Standards follow a "premium" aesthetic: high-end, clean, and professional. Avoid "toy-like" or "cartoonish" designs.
3. **Geometric Simplicity**: Professional design relies on geometric simplicity and line-art (Lucide-style).

## Rules
1. **No Inline SVGs**: Never paste `<svg>` tags directly into `.blade.php`.
2. **Module Isolation**: Store `.svg` files in the module responsible for the icon: `Modules/{ModuleName}/resources/svg/{icon_name}.svg`.
3. **Naming Convention**: 
   - Files: Lowercase, kebab-case (e.g., `logo.svg`, `user-avatar.svg`).
   - Registration: Handled by `XotBaseServiceProvider`.
4. **Standard Component**: Always use `<x-filament::icon />` to render icons.

## Corrective learning
- **The Pizza Slice Error**: Generating a complex, multi-colored pizza slice was a failure. Branding assets must be minimalist line-art or clean geometric symbols (as seen in `meetup-logo.svg`).
