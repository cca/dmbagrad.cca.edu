# Installation

Requirements: composer, PHP, MySQL (minimum versions unknown)

- `composer install` to get PHP dependencies
- set up a MySQL database
- create user with all privileges on database
- enter database & load included "cca.sql" file, create new admin user password:

```sql
mysql> USE dmbagrad;
mysql> source cca.sql;
mysql> UPDATE users SET password = MD5('newpassword') WHERE username = 'admin';
```

- inform app of db connection parameters
    + you can hard-code them into config/config.php but…
    + it's probably better to use the `DB_NAME`, `DB_USER`, `DB_PW` environment variables
- the "www" folder needs to be the document root
    + e.g. if you're running this locally, `cd` into "www" & run `php -S localhost:8000`
- in your web browser, sign in as the admin user at {{domain}}/admin & use the "Update Data" button to pull a fresh set of data from VAULT
