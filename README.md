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

## Development History & Details

The DMBA program worked with an IT outsourcing firm, [Onix Systems](https://onix-systems.com/), who contracted with a developer in the Ukraine to create this app. Thus the Cyrillic code comments. See also: [the developer's original repo](https://bitbucket.org/onix-systems/art-college/src).

The app uses "Simplelight — a fast, small (1.3 mb), powerful framework for developing any web application" as a PHP framework. I haven't found any documentation for this framework. [Here's the git repo](https://github.com/canabina/SimplelightCore) with its uninformative, single-sentence readme.

The app pulls data from public VAULT APIs located at http://libraries-archive.cca.edu/dmba/ (for Design Strategy MBA) and http://libraries-archive.cca.edu/strategic-foresight/ (for Strategic Foresight MBA). The wrapper around EQUELLA's (the backend software powering VAULT) APIs is [another CCA git repo](https://github.com/cca/dmba_vault_api). Note that the libraries-archive subdomain will be retired sometime in the coming year and a replacement API endpoint will need to be made.

# LICENSE

[ECL Version 2.0](https://opensource.org/licenses/ECL-2.0)
