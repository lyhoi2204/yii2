<div class="breadcrumbs column">                   
                	<a href=""><img src="/frontend/img/ads1000x100.jpg" width="940"></a>
</div>   
                <div class="main-content">             	
                    <!-- Popular News -->
                   <div class="column-two-third">
                	   <?= $this->render('_widget/_wordnews',['data'=>$news,'data2'=>$news2,'title'=>$type->name]) ?>
                    </div>
                    <div class="column-two-third">
                    <?php echo app\views\widget\Listx::widget([
                                                'title'=>"New Posts",
                                                'data'=>$data
                                                ]); ?>
                        
                        <?php 

                            $maxpage = app\models\News::find()->where(['type_id'=>Yii::$app->request->get('id')])->count()/20;
                            echo app\views\widget\Paging::widget([
                                'maxpage'=>$maxpage
                                ]);
                         ?>
                    	
                    </div>
                    <!-- /Popular News -->
               
                </div>



                    <?php  echo $this->render('_widget/_bigads'); ?>
                    <?php echo app\views\widget\Small2::widget([
                        'title'=> 'Popular',
                        'data' => $popular,
                        ]) ?>


                    <?= $this->render('_widget/_category'); ?>
                    <?= $this->render('_widget/_fb'); ?>
                    <?= $this->render('_widget/_smallads'); ?>
                <!-- /Main Content -->