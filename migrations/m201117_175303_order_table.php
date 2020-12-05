<?php

use yii\db\Migration;

/**
 * Class m201117_175303_order_table
 */
class m201117_175303_order_table extends Migration
{
    private $order = '{{%order}}';
    private $order_item = '{{%order_item}}';
    private $product = '{{%product}}';
    private $fk_order_item_oreder = 'fk-order_item-order_id';
    private $fk_order_item_product = 'fk-order_item-product_id';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->order,
            [
                'id' => $this->primaryKey()->unique(),
                'qty' => $this->integer(),
                'sum' => $this->float(),
                'status' => $this->boolean(),
                'name' => $this->string(255),
                'email' => $this->string(255),
                'phone'=> $this->string(255),
                'address' => $this->string(255),
                'created_at' => $this->timestamp()->defaultValue(null),
                'updated_at' => $this->timestamp()->defaultValue(null),
            ]
        );

        $this->createTable($this->order_item,
            [
                'id' => $this->primaryKey()->unique(),
                'order_id' => $this->integer(),
                'product_id' => $this->integer(),
                'name' => $this->string(255),
                'price' => $this->float(),
                'qty_item' => $this->integer(),
                'sum_item' => $this->float(),
            ]
        );

        $this->addForeignKey(
            $this->fk_order_item_oreder,
            $this->order_item,
            'order_id',
            $this->order,
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            $this->fk_order_item_product,
            $this->order_item,
            'product_id',
            $this->product,
            'id',
            'CASCADE'
        );

        return \yii\console\ExitCode::OK;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey($this->fk_order_item_oreder, $this->order_item);
        $this->dropForeignKey($this->fk_order_item_product, $this->order_item);
        $this->dropTable($this->order);
        $this->dropTable($this->order_item);

        return \yii\console\ExitCode::OK;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201117_175303_order_table cannot be reverted.\n";

        return false;
    }
    */
}
