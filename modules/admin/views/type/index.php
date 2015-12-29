<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\helpers\ActionIndex;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="content-container">              
                <div id="page-content">

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $this->title ?></h3>
                        </div>

                        <div class="panel-heading">
                            <p><?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?></p>
                        </div>
                        <div class="panel-body">
                            <table data-toggle="table"
                                   data-url="data/bs-table.json"
                                   data-show-columns="true"
                                   data-page-list="[5, 10, 20]"
                                   data-page-size="5"
                                   data-pagination="true" data-show-pagination-switch="true">
                                <thead>
                                <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\CheckboxColumn'],

                                            [
                                                'attribute' => 'id',
                                                'contentOptions' => ['style' => 'width:100px;'],
                                            ],
                                            'name',
                                          
                                            'slug',
                                            //'images',
                                            'categories.name',
                                            'statusx',
                                            

                                            ['class' => 'app\helpers\ActionIndex'],
                                        ],
                                    ]); ?>
                                </thead>
                            </table>
                        </div>
                    </div>
          
                </div>
 
            </div>

