<?php

use yii\db\Migration;

/**
 * Class m201010_170540_fillcategory
 */
class m201010_170540_fillcategory extends Migration
{
    private $category = '{{%category}}';
    private $categoryList = [
        ['Sportwear'],
        ['Mens'],
        ['Womens'],
        ['Kids'],
        ['Fashion'],
        ['Households'],
        ['Interiors'],
        ['Clothing'],
        ['Bags'],
        ['Shoes'],
    ];

    private $categorySecond = [
        [1, 'Nike'],
        [1, 'Under Armour'],
        [1, 'Adidas'],
        [1, 'Puma'],
        [1, 'Asics'],
        [2, 'Fendi'],
        [2, 'FendiGuess'],
        [2, 'Valentino'],
        [2, 'Dior'],
        [2, 'Versace'],
        [2, 'Armani'],
        [2, 'Prada'],
        [2, 'Dolce and Gabbana'],
        [2, 'Chanel'],
        [2, 'Gucci'],
        [3, 'Fendi'],
        [3, 'Guess'],
        [3, 'Valentino'],
        [3, 'Dior'],
        [3, 'Versace'],
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach ($this->categoryList as $categoryItem){
                $this->insert($this->category,
                [
                    'name'=>$categoryItem[0],
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ]
                );
            }
        foreach ($this->categorySecond as $categoryItem){
            $this->insert($this->category,
                [
                    'name'=>$categoryItem[1],
                    'parent_id'=>$categoryItem[0],
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable($this->category);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201010_170540_fillcategory cannot be reverted.\n";

        return false;
    }
    */
}
