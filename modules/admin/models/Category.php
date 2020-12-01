<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string|null $keyword
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'default', 'value' => null],
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'keyword', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ІД',
            'parent_id' => 'Батьківська категорія',
            'name' => 'Імя',
            'keyword' => 'Ключові слова',
            'description' => 'Опис',
            'created_at' => 'Створено',
            'updated_at' => 'Оновлено',
        ];
    }
}
