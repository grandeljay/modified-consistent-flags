# Consistent Flags

A modified-shop module which changes all of the flags for each language to a consistent style.

## Notes

-   This module does not overwrite any files.
-   The MMLC currently does not copy over hidden files, you will need to manually add the file `/src/includes/external/grandeljay/consistent_flags/.htaccess`

## Installation

Since modified does not provide a clean option to change the language flags, you will need to add the following rule to the `.htaccess` file in your shop-root.

```sh
## BOC - grandeljay - Consistent Flags
RewriteRule ^lang/([[:alpha:]]+)/(admin/images/)?.+\.(gif|png|svg|jpg|jpeg)$ includes/external/grandeljay/consistent_flags/icon.php?icon=$1 [QSA,L]
## EOC - grandeljay - Consistent Flags
```

You may place this anywhere (preferably right at the bottom). Just make sure it's still inside `<IfModule mod_rewrite.c>` `</IfModule>`.
