<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $images
 * @property string $description
 * @property string $seo_keywords
 * @property string $seo_title
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Videos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'required'],
            [['description'], 'string'],
            [['type_id', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'url', 'images', 'seo_keywords', 'seo_title'], 'string', 'max' => 255]
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
            'url' => 'Url',
            'images' => 'Images',
            'description' => 'Description',
            'seo_keywords' => 'Seo Keywords',
            'seo_title' => 'Seo Title',
            'type_id' => 'Type ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
