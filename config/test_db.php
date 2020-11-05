<?php
$dns='pgsql:host=yiipgsql-test;port=5432;dbname=yii_test_db';
if(PHP_OS == 'WINNT'){
    $dns='pgsql:host=yiipgsql-test;port=5432;dbname=yii_test_db';
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => $dns,
    'username' => 'yii_test',
    'password' => 'yii_test',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
