<?php
$dns='pgsql:host=yiipgsql;port=5432;dbname=yii_db';
if(PHP_OS == 'WINNT'){
    $dns='pgsql:host=yiipgsql;port=5432;dbname=yii_db';
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => $dns,
    'username' => 'yii',
    'password' => 'yii',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
