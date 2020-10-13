<?php

use yii\db\Migration;

/**
 * Class m201010_162915_initdb
 */
class m201010_162915_initdb extends Migration
{
    private $category = '{{%category}}';
    private $product = '{{%product}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->category,
            [
                'id' => $this->primaryKey()->unique(),
                'parent_id' => $this->integer()->defaultValue(0),
                'name' => $this->string(255)->notNull(),
                'keyword' => $this->string(255)->defaultValue(null),
                'description' => $this->string(255)->defaultValue(null),
                'created_at' => $this->timestamp()->defaultValue(null),
                'updated_at' => $this->timestamp()->defaultValue(null),
            ]
        );
        $this->createTable($this->product,
            [
                'id' => $this->primaryKey()->unique(),
                'category_id' => $this->integer(),
                'name' => $this->string(255)->notNull(),
                'content' => $this->string(255)->defaultValue(null),
                'price' => $this->float()->defaultValue(0),
                'keyword' => $this->string(255)->defaultValue(null),
                'description' => $this->string(255)->defaultValue(null),
                'img' => $this->string(255)->defaultValue('no-image.png'),
                'hit' => $this->boolean(),
                'sale' => $this->boolean(),
                'created_at' => $this->timestamp()->defaultValue(null),
                'updated_at' => $this->timestamp()->defaultValue(null),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->category);
        $this->dropTable($this->product);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201010_162915_initdb cannot be reverted.\n";

        return false;
    }
    */
}
