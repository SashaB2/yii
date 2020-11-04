<?php
$dns='pgsql:host=yiipgsql;port=5432;dbname=cipgsql';
if(PHP_OS == 'WINNT'){
//    $dns='pgsql:host=localhost;port=5456;dbname=cipgsql';
    $dns='pgsql:host=localhost;port=5432;dbname=yii_db';
}

return [
    'class' => 'yii\db\Connection',

//    'dsn' => 'pgsql:host=yiipgsql;port=5432;dbname=cipgsql',
//    'dsn' => 'pgsql:host=localhost;port=5456;dbname=cipgsql',
    'dsn' => $dns,
//    'username' => 'currencyinfo',
    'username' => 'yii',
//    'password' => 'currencyinfo',
    'password' => 'yii',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
