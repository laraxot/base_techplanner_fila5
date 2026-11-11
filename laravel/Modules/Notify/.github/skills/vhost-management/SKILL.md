# 🌐 VHost Management Skill

> **Version**: 1.0.0  
> **Last Updated**: 2026-03-31  
> **Status**: ✅ Active

---

## 📋 Overview

This skill provides automated assistance for Apache VirtualHost configuration and management in the FixCity platform.

---

## 🎯 Capabilities

### 1. VHost Configuration

**What it does**:
- Creates Apache vhost configurations
- Validates vhost syntax
- Sets up document root correctly
- Configures logging

**When to use**:
- Setting up new local environment
- Adding new development domains
- Configuring Apache for Laravel

**Example**:
```bash
# Trigger phrases:
- "create vhost for fixcity.local"
- "configure Apache virtual host"
- "setup local development domain"
- "fix document root configuration"
```

---

### 2. Document Root Governance

**What it does**:
- Ensures document root is `public_html/`
- Validates directory permissions
- Checks .htaccess configuration

**Rules**:
```apache
# ✅ CORRECT
DocumentRoot /var/www/_bases/base_fixcity_fila5/public_html

# ❌ WRONG - Never use laravel/ directly
DocumentRoot /var/www/_bases/base_fixcity_fila5/laravel
```

---

### 3. Setup Automation

**What it does**:
- Copies vhost config to Apache
- Enables site with a2ensite
- Reloads Apache service
- Updates /etc/hosts file

**Commands**:
```bash
# Full setup workflow
sudo cp laravel/config/vhost/fixcity.local.conf /etc/apache2/sites-available/
sudo a2ensite fixcity.local.conf
sudo systemctl reload apache2
echo "127.0.0.1 fixcity.local" | sudo tee -a /etc/hosts
```

---

## 📁 File Locations

### Configuration Files

| File | Purpose | Location |
|------|---------|----------|
| `fixcity.local.conf` | Apache vhost config | `laravel/config/vhost/` |
| `.htaccess` | URL rewriting | `public_html/` |
| `httpd.conf` | Apache main config | `/etc/apache2/` |

### Documentation Files

| File | Purpose | Location |
|------|---------|----------|
| `vhost-configuration.md` | Complete guide | `docs/project/` |
| `vhost-configuration.md` | Module perspective | `laravel/Modules/docs/` |
| `vhost-configuration.md` | Theme perspective | `laravel/Themes/docs/` |
| `vhost-governance.md` | Mandatory rules | `docs/rules/` |

---

## 🔧 Usage Examples

### Example 1: Create New VHost

**User**: "I need to create a vhost for myproject.local"

**Skill Response**:
1. Create config file: `laravel/config/vhost/myproject.local.conf`
2. Copy template from `fixcity.local.conf`
3. Update paths and domain names
4. Document in `docs/project/vhost-configuration.md`
5. Run setup commands

---

### Example 2: Fix VHost Issue

**User**: "fixcity.local is not loading"

**Skill Response**:
1. Check if vhost enabled: `apache2ctl -S | grep fixcity`
2. Verify hosts file: `grep fixcity.local /etc/hosts`
3. Test Apache config: `apache2ctl configtest`
4. Check logs: `tail -f /var/log/apache2/fixcity_local_error.log`
5. Verify document root permissions

---

### Example 3: Validate Configuration

**User**: "Is my vhost configuration correct?"

**Skill Response**:
Checklist:
- [ ] Document root is `public_html/`
- [ ] Config in `laravel/config/vhost/`
- [ ] Logging configured
- [ ] mod_rewrite enabled
- [ ] Directory permissions correct
- [ ] Hosts file entry exists

---

## 🚫 Common Mistakes

### Mistake 1: Wrong Document Root

```apache
# ❌ WRONG
DocumentRoot /var/www/_bases/base_fixcity_fila5/laravel

# ✅ CORRECT
DocumentRoot /var/www/_bases/base_fixcity_fila5/public_html
```

**Why**: Exposes Laravel application code and .env file

---

### Mistake 2: Missing mod_rewrite

```apache
# ❌ WRONG - Laravel routing won't work
<Directory /var/www/.../public_html>
    AllowOverride None
</Directory>

# ✅ CORRECT
<Directory /var/www/.../public_html>
    AllowOverride All
    <IfModule mod_rewrite.c>
        RewriteEngine On
    </IfModule>
</Directory>
```

**Why**: Laravel requires URL rewriting for routing

---

### Mistake 3: No Logging

```apache
# ❌ WRONG - Uses default Apache logs
# (no logging configuration)

# ✅ CORRECT
ErrorLog ${APACHE_LOG_DIR}/fixcity_local_error.log
CustomLog ${APACHE_LOG_DIR}/fixcity_local_access.log combined
```

**Why**: Dedicated logs make debugging easier

---

## 📊 Troubleshooting

### Issue: 403 Forbidden

**Diagnosis**:
```bash
ls -la /var/www/_bases/base_fixcity_fila5/public_html
```

**Fix**:
```bash
sudo chown -R www-data:www-data /var/www/_bases/base_fixcity_fila5/public_html
sudo chmod -R 755 /var/www/_bases/base_fixcity_fila5/public_html
```

---

### Issue: 500 Internal Server Error

**Diagnosis**:
```bash
tail -f /var/log/apache2/fixcity_local_error.log
tail -f /var/www/_bases/base_fixcity_fila5/laravel/storage/logs/laravel.log
```

**Common Causes**:
- Wrong document root
- Missing .htaccess
- PHP version mismatch
- Laravel .env misconfiguration

---

### Issue: Site Not Loading

**Diagnosis**:
```bash
# Check if vhost enabled
apache2ctl -S | grep fixcity

# Check hosts file
getent hosts fixcity.local

# Test with curl
curl -I http://fixcity.local
```

**Fix**:
```bash
# Enable vhost
sudo a2ensite fixcity.local.conf

# Update hosts
echo "127.0.0.1 fixcity.local" | sudo tee -a /etc/hosts

# Reload Apache
sudo systemctl reload apache2
```

---

## 🔗 Related Skills

### Internal Skills

- [`docs-standard`](docs-standard.md) - Documentation standards
- [`directory-structure`](directory-structure.md) - Project structure
- [`laraxot-core`](laraxot-core.md) - Laraxot architecture

### External Skills

- [Apache Docs](https://httpd.apache.org/docs/2.4/)
- [Laravel Deployment](https://laravel.com/docs/deployment)
- [Vite Configuration](https://vitejs.dev/)

---

## 📝 Maintenance

### Update Schedule

- **Monthly**: Check for Apache updates
- **Quarterly**: Review security best practices
- **Annually**: Full configuration audit

### Version History

| Version | Date | Changes |
|---------|------|---------|
| 1.0.0 | 2026-03-31 | Initial release |

---

## 📞 Support

- **Slack**: #devops #infrastructure
- **GitHub**: Issue with label `infrastructure`
- **Documentation**: [`docs/project/vhost-configuration.md`](../../docs/project/vhost-configuration.md)

---

**Maintainer**: DevOps Team  
**Status**: ✅ Active  
**Last Review**: 2026-03-31  
**Next Review**: 2026-06-30
