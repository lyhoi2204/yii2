<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Type;
use app\helpers\MyDefine as M;
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div id="page-content">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-base">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#demo-bsc-tab-1" data-toggle="tab"><i class="fa"></i> Information</a></li>
                                    <li><a href="#demo-bsc-tab-2" data-toggle="tab"><i class="fa"></i> Select Tab</a></li>
                                    <li><a href="#demo-bsc-tab-3" data-toggle="tab"><i class="fa"></i> Description</a></li>
                                </ul>
                                
                                    <div class="tab-content">
                                        <div class="tab-pane pad-btm fade in active" id="demo-bsc-tab-1">
                                            <h4 class="text-thin mar-btm">First Tab</h4>
                                            <hr>
                                            <div class=" form-group">
                                                
                                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                                                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                                                    <?= $form->field($model, 'images')->textInput(['maxlength' => true]) ?> 

                                                    <?= $form->field($model,'status')->dropdownList([M::status_disable=>'No',M::status_enable=>'Yes']); ?> 
                                                                                  

                                            </div>                                           
                                        </div>

                                        <div class="tab-pane fade" id="demo-bsc-tab-2">
                                            <h4 class="mar-btm text-thin">Select Tab</h4>
                                            <hr>
                                            <div class="form-group">
                                                    
                                                    <?= $form->field($model,'hot')->dropdownList([M::no=>'No',M::yes=>'Yes']); ?> 

                                                    <?= $form->field($model,'popular')->dropdownList([M::no=>'No',M::yes=>'Yes']); ?> 

                                                    <?= $form->field($model,'feature')->dropdownList([M::no=>'No',M::yes=>'Yes']); ?> 
                                                  
                                                    <?= $form->field($model,'type_id')->dropdownList(ArrayHelper::map(Type::find()->asArray()->all(),'id','name')); ?>

                                                    

                                            </div>
                                            
                                        </div>

                                        <div class="tab-pane fade" id="demo-bsc-tab-3">
                                            <h4 class="mar-btm text-thin">Second Tab</h4>
                                            <hr>
                                            <div class="form-group">

                                                    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => true]) ?>

                                                    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

                                                
                                                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                                                    
                                            </div>
                                            
                                        </div>
                                        <div class="tab-footer clearfix">
                                            
                                                <div class="form-group">
                                                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                                </div>
                                           
                                        </div>
                                    </div>

                              
                            </div>
                        </div>
                    </div>
                </div>



    <?php ActiveForm::end(); ?>

</div>
