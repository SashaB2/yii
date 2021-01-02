<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $name
 * @property string|null $content
 * @property float|null $price
 * @property string|null $keyword
 * @property string|null $description
 * @property string|null $image
 * @property bool|null $hit
 * @property bool|null $new
 * @property bool|null $sale
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property OrderItem[] $orderItems
 */
class Product extends \yii\db\ActiveRecord
{

    public $image;
    public $gallery;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'default', 'value' => null],
            [['category_id'], 'integer'],
            [['name'], 'required'],
            [['price'], 'number'],
            [['hit', 'new', 'sale'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'content', 'keyword', 'description'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ІД',
            'category_id' => 'ІД категорії',
            'name' => 'Імя',
            'content' => 'Контент',
            'price' => 'Ціна',
            'keyword' => 'Ключеве слово',
            'description' => 'Опис',
//            'img' => 'Img',
            'image' => 'Фото',
            'hit' => 'Hit',
            'new' => 'Новинка',
            'sale' => 'Розпродажа',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['product_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.'
                . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            unlink($path);
            return true;
        }else{
            return false;
        }
    }

    public function uploadGallery(){
        if($this->validate()){
            foreach ($this->gallery as $file) {
                $path = 'upload/store/' . $file->baseName . '.'
                    . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }
}
