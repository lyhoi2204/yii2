<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pictures".
 *
 * @property integer $id
 * @property string $name
 * @property string $images
 * @property integer $news_id
 * @property integer $type_id
 * @property integer $categories_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Pictures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pictures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'type_id', 'categories_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'images'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'images' => 'Images',
            'news_id' => 'News ID',
            'type_id' => 'Type ID',
            'categories_id' => 'Categories ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
