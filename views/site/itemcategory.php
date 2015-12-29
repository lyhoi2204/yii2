 

<div class="breadcrumbs column">
                    
                	<a href=""><img src="/frontend/img/ads1000x100.jpg" width="940"></a>
</div>




                   

                

                <div class="main-content">
                	<div class="column-two-third">
                       <?= $this->render('_widget/_wordnews',['data'=>$datat1,'data2'=>$datat2,'title'=> $model->name]) ?>
                    </div>
                    <!-- Popular News -->
                	<div class="column-two-third">

                        <?php echo  app\views\widget\Listx::widget([
                            'title'=>'New Posts',
                            'data'=>$data
                        ])  ?>
                        
                        <?php 

                            $maxpage = app\models\News::fromCategoryall(Yii::$app->request->get('id'))/20;
                            echo app\views\widget\Paging::widget([
                                'maxpage'=>$maxpage
                                ]);
                         ?>
                    	
                    </div>
                    <!-- /Popular News -->
                    
                    
                </div>
                <div class="column-one-third">
                    <?= $this->render('_widget/_bigads'); ?>
                    <?= $this->render('_widget/_category'); ?>
                    <?= $this->render('_widget/_fb'); ?>
                    <?= $this->render('_widget/_smallads'); ?>
                    </div>


                <!-- /Main Content -->

