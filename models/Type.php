<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use app\models\Categories;
use app\helpers\MyDefine;
/**
 * This is the model class for table "type".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $slug
 * @property string $images
 * @property string $description
 * @property string $seo_keywords
 * @property string $seo_title
 * @property integer $category_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['description'], 'string'],
            [['category_id', 'status','display', 'created_at', 'updated_at'], 'integer'],
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
            'display' => 'Display Status',
            'description' => 'Description',
            'seo_keywords' => 'Seo Keywords',
            'seo_title' => 'Seo Title',
            'category_id' => 'Category',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'statusx' => 'Status',
            'category_id.name' => 'Category',
        ];
    }

    public function getStatusx()
    {
        if($this->status == 0) : return 'Disable';
        elseif($this->status == 1) : return 'Enable';
        else : return 'NotSet';
        endif;
    }



    public function getCategories() {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function idFromCategory($id)
    {
        return self::find()->where(['category_id'=>$id])->all();
    }

    public static function all()
    {
        return self::find()->where(['status'=>MyDefine::status_enable])->orderBy(['id'=>SORT_DESC])->all();
    }

}
