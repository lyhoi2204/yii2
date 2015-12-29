<?php

namespace app\helpers;

use Yii;
use yii\helpers\Html;

class ActionIndex extends \yii\grid\ActionColumn {
    
    public $options = ['style'=>'width:140px;'];
    protected function initDefaultButtons() {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'View'),
                    'aria-label' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-success backend-action btn-md'
                        ], $this->buttonOptions);
                return Html::a('<i class="fa fa-search-plus"></i>', $url, $options);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Update'),
                    'aria-label' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-warning backend-action btn-md'
                        ], $this->buttonOptions);
                return Html::a('<i class="fa fa-edit"></i>', $url, $options);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Delete'),
                    'aria-label' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                    'class' => 'btn btn-danger backend-action role-remove btn-md'
                        ], $this->buttonOptions);
                return Html::a('<i class="fa fa-trash-o"></i>', $url, $options);
            };
        }
    }

}
