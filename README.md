Brokenice Laravel SQLAnyWhere
============

Adds an Sybase driver to Laravel ^5, usable with Fluent and Eloquent.

Requirements
============

You need to install sql_anywhere driver, and make sure that you can call **sasql_connect**
from php:

```php
<?php
# Connect using the default user ID and password
$conn = sasql_connect( "UID=dba;PWD=sql;DBN=forge;HOST=127.0.0.1:2638" );
if( ! $conn ) {
    echo "Connection failed\n";
} else {
    echo "Connected successfully\n";
    sasql_close( $conn );
}?>
```

If you want to use it inside a docker use the provided **Dockerfile**.

Installation
============

```javascript
{
    "require": {
        "brokenice/larave-sqlanywhere": "dev-master"
    }
}
```

Configuration
=============

There is no separate package configuration file for LaravelODBC.  You'll just add a new array to the `connections` array in `app/config/database.php`.

```
'sqlanywhere' => [
    'driver'      => 'sqlanywhere',
    'host'        => env('SYBASE_DB_HOST', 'localhost'),
    'port'        => env('SYBASE_DB_PORT', '2638'),
    'username'    => env('SYBASE_DB_USERNAME', 'dba'),
    'password'    => env('SYBASE_DB_PASSWORD', 'sql'),
    'database'    => env('SYBASE_DB_DATABASE', 'forge'),
    'auto_commit' => true,
    'persintent'  => false,
    'charset'     => 'utf8',
],
```

