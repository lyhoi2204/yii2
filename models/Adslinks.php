<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "adslinks".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $images
 * @property string $url
 * @property integer $view_count
 * @property string $location
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Adslinks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adslinks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'required'],
            [['view_count', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'title', 'images', 'url', 'location'], 'string', 'max' => 255]
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
            'title' => 'Title',
            'images' => 'Images',
            'url' => 'Url',
            'view_count' => 'View Count',
            'location' => 'Location',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
