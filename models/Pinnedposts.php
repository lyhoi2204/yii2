<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pinnedposts".
 *
 * @property integer $id
 * @property string $news_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Pinnedposts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pinnedposts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['news_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'News ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
