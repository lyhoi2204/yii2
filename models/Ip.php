<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ip".
 *
 * @property integer $id
 * @property string $ip
 * @property integer $news_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Ip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['ip'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'news_id' => 'News ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
