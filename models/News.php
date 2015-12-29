<?php

namespace app\models;
use app\helpers\MyDefine as M;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $slug
 * @property string $images
 * @property string $description
 * @property string $seo_keywords
 * @property string $seo_title
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $view_count
 * @property integer $hot
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['type_id','popular','alexa','feature', 'user_id', 'view_count', 'hot', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug','source', 'images', 'seo_keywords', 'seo_title'], 'string', 'max' => 255],
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
            'popular' => 'Popular',
            'feature' => 'Feature',
            'alexa' => 'Alexa',
            'images' => 'Images',
            'source' => 'Source',
            'description' => 'Description',
            'seo_keywords' => 'Seo Keywords',
            'seo_title' => 'Seo Title',
            'type_id' => 'Type ID',
            'user_id' => 'User ID',

            'view_count' => 'View Count',
            'hot' => 'Hot',
            'hotx' => 'Hot',
            'status' => 'Status',
            'statusx' => 'Status',
            'popularx' => 'Popular',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'type.name' => 'Category',
        ];
    }

    public function getStatusLabel()
    {
        return $this->status ? "<label font-weight' class='text-success'>Enable</label>" : "<label font-weight' class='text-warning'>Disable</label>" ;
    }

    public function getHotLabel()
    {
        return $this->hot ? "<label font-weight' class='text-danger'>Yes</label>" : "<label font-weight' class='text-mint'>No</label>" ;
    }

    public function getPopularLabel()
    {
        return $this->popular ? "<label font-weight' class='text-success'>Yes</label>" : "<label font-weight' class='text-mint'>No</label>" ;
    }

    public function getType()
    {
        return $this->hasOne(Type::className(),['id'=>'type_id']);
    }


    /*
    * Funtion find model
    */

    public function popularfromType($id,$limit = 10,$offset = 0)
    {
        return self::find()->where(['type_id'=>$id,'popular'=>M::yes])->limit($limit)->offset($offset)->orderBy(['id'=>SORT_DESC])->all();
    }
    public function news($limit = 10 , $offset = 0)
    {
        return self::find()->where(['status'=>M::status_enable])->orderBy(['id'=>SORT_DESC])->limit($limit)->offset($offset)->all();
    }

    public function newsfromType($id,$limit = 10 , $offset = 0)
    {
        return self::find()->where(['type_id'=>$id,'status'=>M::status_enable])->orderBy(['id'=>SORT_DESC])->limit($limit)->offset($offset)->all();
    }

    public function fromCategory($id,$limit = 10,$offset = 0)
    {
        $idcat = Type::find()->where(['category_id'=>$id])->all();
        if(count($idcat) > 1) :
            foreach ($idcat as $item)  $arr[] = $item->id;
        else : $arr[] = null ; endif;
       
        return self::find()->where(['type_id'=>$arr])->limit($limit)->offset($offset)->orderBy(['id'=>SORT_DESC])->all();     
    }

    public static function fromCategoryall($id)
    {
        $idcat = Type::find()->where(['category_id'=>$id])->all();
        if(count($idcat) > 1) :
            foreach ($idcat as $item)  $arr[] = $item->id;
        else : $arr[] = null ; endif;
       
        return self::find()->where(['type_id'=>$arr])->count();     
    }

    public function relaolder($id,$limit = 10,$offset = 0)
    {
        $type = self::findOne(['id'=>$id]);
        return self::find()->where(['<','id',$id])->andWhere(['type_id'=>$type['type_id']])->limit(10)->orderBy(['id'=>SORT_DESC])->all();  
    }

    public function relanew($id,$limit = 10,$offset = 0)
    {
        $type = self::findOne(['id'=>$id]);
        return self::find()->where(['>','id',$id])->andWhere(['type_id'=>$type['type_id']])->limit(10)->orderBy(['id'=>SORT_ASC])->all();  
    }


    public function popular($limit = 10,$offset = 0)
    {
        return self::find()->where(['status'=>M::status_enable,'popular'=>M::yes])->orderBy(['id'=>SORT_DESC])->limit($limit)->offset($offset)->all();
    }


    public function hot($limit = 10 , $offset = 0)
    {
        return self::find()->where(['status'=>M::status_enable])->andWhere(['hot'=>M::yes])->orderBy(['id'=>SORT_DESC])->limit($limit)->offset($offset)->all();
    }


    public static function fromType($id)
    {
        return self::find()->where(['status'=>M::status_enable,'type_id'=>$id])->limit(10)->all();
    }
}
