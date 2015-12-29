<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content-container">  

    <div class="col-md-12"> 




    <div class="panel panel-primary">
                    
                                <!--Panel heading-->
                                <div class="panel-heading">
                                    <div class="panel-control">
                    
                                        <!--Nav tabs-->
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#demo-tabs-box-1">First Tab</a>
                                            </li>
                                            <li><a data-toggle="tab" href="#demo-tabs-box-2">Description</a>
                                            </li>
                                        </ul>
                    
                                    </div>
                                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                                </div>

                    
                                <!--Panel body-->
                                <div class="panel-body">
                    

                                        <p>
                                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                                'class' => 'btn btn-danger',
                                                'data' => [
                                                    'confirm' => 'Are you sure you want to delete this item?',
                                                    'method' => 'post',
                                                ],
                                            ]) ?>
                                        </p>


                                    <!--Tabs content-->
                                    <div class="tab-content">
                                        <div id="demo-tabs-box-1" class="tab-pane fade in active">
                                            <h4 class="text-thin">Reviews</h4>
                                            <?= DetailView::widget([
                                                'model' => $model,
                                                'attributes' => [
                                                    'id',
                                                    'name',
                                                    'slug',
                                                    'images',
                                                    //'description:html',
                                                    //'seo_keywords',
                                                    //'seo_title',
                                                    'type.name',
                                                    //'post_final',
                                                    'view_count',
                                                    'hot',
                                                    //'statusx',
                                                    'created_at:date',
                                                    'updated_at:date',
                                                ],
                                            ]) ?>
                                        </div>
                                        <div id="demo-tabs-box-2" class="tab-pane fade">
                                            <h4 class="text-thin">Description</h4>
                                            <div class="col-md-10">
                                                
                                                <?= DetailView::widget([
                                                'model' => $model,
                                                'attributes' => [
                                                    
                                                    'seo_keywords',
                                                    'seo_title',
                                                    'description:html',
                                                    
                                                ],
                                            ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--===================================================-->
                            <!--End of panel with tabs-->

</div>
</div>
