<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\News;
use yii\widgets\Pjax;
use app\helpers\MyDefine as M;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="content-container">              
                <div id="page-content">

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $this->title ?></h3>
                        </div>

                        <div class="panel-heading">
                            <p> 
                                <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
                                
                            </p>
                        </div>
                        <style type="text/css">
                        .panel-heading p span{padding:20px; };
                        </style>

                    
                        <?php $this->registerJs("
                            $('document').ready(function(){
                                    $('#del').click(function(){

                                        alert('ok');
                                    })
                                })
                             ");
                        ?>

                        <div class="panel-heading" align="right" >
                            <p>
                           <div class="widget-buttons buttons-bordered">
                            <button id="del" class="btn btn-danger deleteall" title="Delete Selected"><i class="fa fa-trash"></i> Trash</button>
                        </div>
                       
                            <span>
                                <?= Html::a('Popular On', ['onpopular'], ['class' => 'btn btn-info']) ?>
                                <?= Html::a('Popular Off', ['offpopular'], ['class' => 'btn btn-warning']) ?>
                            </span>
                         
                            </p>
                            
                        </div>

                         <input type="button" class="btn btn-info" value="Multiple Delete" id="MyButton" >


                        <?php 

                            $this->registerJs(' 

                            $(document).ready(function(){
                            $("#MyButton").click(function(){

                                alert("ok");
                               

                            });
                            });', \yii\web\View::POS_READY);

                        ?>

                        

                        <div class="panel-body">
                            <table data-toggle="table"
                                   data-url="data/bs-table.json"
                                   data-show-columns="true"
                                   data-page-list="[5, 10, 20]"
                                   data-page-size="5"
                                   data-pagination="true" data-show-pagination-switch="true">
                                <thead>

                                <?php echo GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\CheckboxColumn'],
                                            ['class' => 'yii\grid\SerialColumn'],
                                            
                                            'name',
                                 
                                            //'slug',
                                            [
                                                'attribute'=>'images',
                                                'format' => 'raw',
                                                'value' => function($d){
                                                    return Html::img($d->images,['width'=>'100px']);
                                                },
                                            ],
                                            'type.name',
                                            [
                                                'attribute'=>'popular',
                                                'format'=>'raw',
                                                'value' => 'popularLabel',
                                                'filter'=>[M::no=>"No",m::yes=>"Yes"],
                                                'contentOptions'=>['width'=>100],
                                            ],
                                            [
                                                'attribute'=>'hot',
                                                'format'=>'raw',
                                                'value' => 'hotLabel',
                                                'filter'=>[M::no=>"No",m::yes=>"Yes"],
                                                'contentOptions'=>['width'=>100],
                                            ],

                                            [
                                                'attribute'=>'status',
                                                'format' => 'raw',
                                                'value' => 'statusLabel',
                                                'filter'=>[M::status_enable=>"No",M::status_disable=>"Yes"],
                                                'contentOptions'=>['width'=>100],
                                            ],
                                            

                                            ['class' => 'app\helpers\ActionIndex'],
                                        ],
                                    ]);  ?>
                                </thead>
                            </table>
                        </div>
                    </div>
          
                </div>
 
            </div>

