<?php //echo $this->render('_widget/_category') ?>

<title><?= $model->name ?></title>

<div class="breadcrumbs column">
                	<!--<p><a href="#">Home.</a>   \\   <a href="#">World News.</a>   \\   Single.</p>-->
                    <a href=""><img src="/frontend/img/ads1000x100.jpg" width="940"></a>
                </div>
            
            	<!-- Main Content -->
                <div class="main-content">                  
                    <!-- Single -->
                    <div class="column-two-third single">
                        <div id="x1x">
                            <h3 class="title"><?= $model->name ?></h3>
                            <span class="meta"><?= date("Y-m-d",$model->created_at) ?></span>
                            <p style="font-size:14px; font-weight:bold;"><?php //echo $model->seo_title ?></p>

                            <p><?= $model->description ?></p>
                        </div>
                        <ul class="sharebox">
                            <li><a href="#"><span class="facebook">Share</span></a></li>
                        </ul>
                        
                        <!--- ADMIN ------>
                        <div class="authorbox">
                            <img src="/frontend/img/trash/author.png" alt="MyPassion" />
                            <h6>MyPassion.</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales dapibus dui, sed iaculis metus facilisis sed. Etiam scelerisque molestie purus vel mollis. Mauris dapibu quam id turpis dignissim rutrum.</p>
                        </div>


                        <?php //echo $this->render('_widget/_comment'); ?>

                        <?php echo app\views\widget\Onlytext::widget([
                            'title'=>'Bài viết cũ hơn',
                            'data' => $model->relaolder(Yii::$app->request->get('id'),10,0),
                        ]); ?>

                        <?php echo app\views\widget\Listx::widget([
                            'title'=>'bài viết mới hơn',
                            'data' => $model->relanew(Yii::$app->request->get('id'),10,0)
                        ]); ?>

                        

                    </div>
                     
                  
                    
                </div>


                <?= $this->render('_widget/_bigads'); ?>
                <?php echo app\views\widget\Small2::widget([
                            'title'=>'Tin Nổi Bật',
                            'data' => $model->popularfromType(Yii::$app->request->get('id'),10,0)
                        ]); ?>

                <?= $this->render('_widget/_smallads'); ?>
                
                <?= $this->render('_widget/_fb'); ?>

                <!-- /Main Content -->