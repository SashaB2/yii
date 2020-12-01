<?php

use yii\db\Migration;

/**
 * Class m201123_215808_user_table
 */
class m201123_215808_user_table extends Migration
{
    private $tableName = '{{%user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName,[
            'id' => $this->primaryKey()->unique(),
            'username' => $this->string(255),
            'password' => $this->string(255),
            'auth_key' => $this->string(255)->defaultValue(null),
        ]);

        return \yii\console\ExitCode::OK;

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);

        return \yii\console\ExitCode::OK;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201123_215808_user_table cannot be reverted.\n";

        return false;
    }
    */
}
