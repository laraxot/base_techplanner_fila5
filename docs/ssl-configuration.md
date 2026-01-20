# SSL Configuration for Laravel Application

When running the application with SSL/HTTPS, you may need to update your .env file to reflect the secure URL:

```
APP_URL=https://techplanner.local
```

This ensures:
- Asset URLs are generated with HTTPS
- Redirects maintain the HTTPS protocol
- Session cookies are properly handled with secure flag when appropriate

The SSL certificates have been generated and configured in Apache with the setup script located at:
- `bashscripts/ssl/setup_techplanner_ssl.sh`

The certificates are valid for 365 days and are self-signed, which is appropriate for development environments but should be replaced with certificates from a trusted Certificate Authority in production.

To access the application securely after SSL setup:
1. Run the SSL setup script: `bash bashscripts/ssl/setup_techplanner_ssl.sh`
2. Update your APP_URL in .env to use https://techplanner.local
3. Access the application at: https://techplanner.local

Note: You may need to accept the self-signed certificate warning in your browser.