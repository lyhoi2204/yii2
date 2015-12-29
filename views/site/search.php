<?php //echo $this->render('_widget/_category') ?>

<?php $title = "SEARCH"; ?>

<div class="breadcrumbs column">
                	<!--<p><a href="#">Home.</a>   \\   <a href="#">World News.</a>   \\   Single.</p>-->
                    <a href=""><img src="/frontend/img/ads1000x100.jpg" width="940"></a>
                </div>
            
            	<!-- Main Content -->
                <div class="main-content">                  
                    <!-- Single -->
                    <div class="column-two-third single">
                   
                        <h3 class="title">kết quả tìm kiếm</h3>
                            <span class="meta"></a>Keyword : <?= Yii::$app->request->get('keyword') ?><a href="#">.</a></span>
                            <p style="font-size:14px; font-weight:bold;"></p>
                            <p></p>
                        
                            <?php echo app\views\widget\Listx::widget([
                                'title' => 'Kết quả tìm kiếm',
                                'data' => $search
                                ]); ?>
                            
                        



                        

                    </div>
                     
                  
                    
                </div>

<div class="column-one-third">
               
                <?= $this->render('_widget/_smallads'); ?>
                
                <?= $this->render('_widget/_fb'); ?>
</div>
                <!-- /Main Content -->