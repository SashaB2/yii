<?php

use yii\db\Migration;

/**
 * Class m201021_163642_product
 */
class m201021_163642_product extends Migration
{
    private $product = '{{%product}}';
    private $productItem = [
        [4,'prduct_name1','content',111.1,'keyword1','description1','product1.jpg',0,0,0],
        [4,'prduct_name2','content',111.1,'keyword1','description1','product2.jpg',1,0,0],
        [9,'prduct_name3','content',111.1,'keyword1','description1','product3.jpg',1,1,0],
        [21,'prduct_name4','content',111.1,'keyword1','description1','product4.jpg',1,0,1],
        [25,'prduct_name5','content',111.1,'keyword1','description1','product5.jpg',1,0,0],
        [28,'prduct_name6','content',111.1,'keyword1','description1','product6.jpg',1,0,0],
        [26,'prduct_name7','content',111.1,'keyword1','description1','no-image.png',1,1,0],
        [26,'prduct_name8','content',111.1,'keyword1','description1','no-image.png',0,0,1],
        [26,'prduct_name9','content',111.1,'keyword1','description1','product1.jpg',0,0,0],
        [29,'prduct_name10','content',111.1,'keyword1','description1','product3.jpg',0,1,0],
        [29,'prduct_name11','content',111.1,'keyword1','description1','no-image.png',0,0,1],
        [29,'prduct_name12','content',111.1,'keyword1','description1','product5.jpg',0,0,0],
        [29,'prduct_name13','content',111.1,'keyword1','description1','no-image.png',0,0,0],
        [29,'prduct_name14','content',111.1,'keyword1','description1','no-image.png',0,0,0],
    ];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            foreach ($this->productItem as $item){
                $this->insert($this->product, [
                    'category_id'=>$item[0],
                    'name'=>$item[1],
                    'content'=>$item[2],
                    'price'=>$item[3],
                    'keyword'=>$item[4],
                    'description'=>$item[5],
                    'img'=>$item[6],
                    'hit'=>$item[7],
                    'new'=>$item[8],
                    'sale'=>$item[9],
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s'),
                ]);
            }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable($this->product);

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201021_163642_product cannot be reverted.\n";

        return false;
    }
    */
}
