<?php

use app\models\News;
use yii\helpers\Url;
?>

<?php 
    $title = "Khoa học - công nghệ - khám phá - bí ẩn";
    echo $this->render('_widget/_slider') ; 
 ?>
 
<title><?= $title ?></title>
<div class="main-content">
                    
                    <!-- Popular News -->
                    <div class="column-two-third">

                        <?php
                            echo app\views\widget\Listx::widget([
                                'title'=>'Tin mới nhất',
                                'data'=>$nnews,
                                ]);
                        ?>

                        <?php 
                            $maxpage = News::find(['id'])->count()/20;
                            echo app\views\widget\Paging::widget([
                                'maxpage'=>$maxpage
                                ]);
                         ?>
                        
                    </div>               
                    
                </div>
                <?= $this->render('_widget/_bigads') ?>
                <?php echo app\views\widget\Small2::widget([
                        'title'=> 'Tin Nổi Bật',
                        'data' => $news->popular(10,0),
                        ])

                  ?>
                <?= $this->render('_widget/_fb') ?>
                <?= $this->render('_widget/_smallads') ?>
                <?= $this->render('_widget/_video') ?>