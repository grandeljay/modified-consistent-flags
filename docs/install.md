## Note

This module does not overwrite any files.

Supported languages are currently:

-   English
-   French
-   German
-   Italian
-   Spanish

## Installation

Since modified does not provide a clean option to change the language flags, you will need to add the following rule to the `.htaccess` file in your shop-root.

```sh
## BOC - grandeljay - Consistent Flags
RewriteRule ^lang/([[:alpha:]]+)/admin/images/icon.gif includes/external/grandeljay/consistent-flags/language/$1.png [L]
## EOC - grandeljay - Consistent Flags
```

You may place this anywhere (preferably right at the bottom). Just make sure it's still inside `<IfModule mod_rewrite.c></IfModule>`.
