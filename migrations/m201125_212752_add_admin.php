<?php

use yii\db\Migration;

/**
 * Class m201125_212752_add_admin
 */
class m201125_212752_add_admin extends Migration
{
    private $tableName = '{{%user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert($this->tableName, [
            'username' => 'admin',
            'password' => '$2y$13$pweZ41o9JQB3DmGoSxcBpOjBKKFvocuhM8aACpaE82nuTT2kiJAgi'
        ]);
        return \yii\console\ExitCode::OK;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete($this->tableName, ['username' => 'admin']);

        return \yii\console\ExitCode::OK;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201125_212752_add_admin cannot be reverted.\n";

        return false;
    }
    */
}
