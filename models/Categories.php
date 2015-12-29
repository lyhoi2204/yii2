<?php

namespace app\models;

use Yii;
use app\models\Type;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $slug
 * @property string $images
 * @property string $description
 * @property string $seo_keywords
 * @property string $seo_title
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['description'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'images', 'seo_keywords', 'seo_title'], 'string', 'max' => 255],
            [['slug'], 'unique']
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
            'slug' => 'Slug',
            'images' => 'Images',
            'description' => 'Description',
            'seo_keywords' => 'Seo Keywords',
            'seo_title' => 'Seo Title',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getStatusx()
    {
        if($this->status == 0) : return 'Disable';
        elseif($this->status == 1) : return 'Enable';
        else : return 'NotSet';
        endif;
    }

    public function arrAll() {
        return \yii\helpers\ArrayHelper::map(self::find()->select(['id', 'name'])->all(), 'id', 'name');
    }

    
}
