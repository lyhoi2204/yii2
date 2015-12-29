<?php
use app\models\News;
//use app\helpers\MyDefine;
use app\helpers\MyDefine;
use yii\helpers\Url;
$news = new News();

?>

<section id="slider">
            <div class="container">
                <div class="main-slider">
                	<div class="badg">
                    	<p><a href="#">News.</a></p>
                    </div>
                	<div class="flexslider">
                        <ul class="slides">

                        <?php foreach($news->news(5,3) as $item) : ?>
                            <li style="width:540px; height:370px; overflow:hidden;">
                                <a href="<?= Url::to(['site/detail','id'=>$item->id,'slug'=>$item->slug]) ?>">
                                    <img width="540px" src="<?= $item['images'] ?>" alt="MyPassion" />
                                </a>
                                <p class="flex-caption"><a href="<?= Url::to(['site/detail','id'=>$item->id,'slug'=>$item->slug]) ?>"><?= $item->name ?></a><?= $item->seo_title ?></p>
                            </li>
                        <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
                
                <div class="slider2" style="width:380px; height:220px; overflow:hidden;">
                	<div class="badg">
                    	<p><a href="#">Hot.</a></p>
                    </div>
                    <?php foreach($news->hot(1) as $item ) :  ?>
                    <a href="<?= Url::to(['site/detail','id'=>$item->id,'slug'=>$item->slug]) ?>"><img width="380" src="<?= $item->images ?>" alt="MyPassion" /></a>
                    <a href="<?= Url::to(['site/detail','id'=>$item->id,'slug'=>$item->slug]) ?>">
                        <p class="caption"><a href="<?= Url::to(['site/detail','id'=>$item->id,'slug'=>$item->slug]) ?>"><?= $item->name ?></a><?= mb_substr($item->seo_title,0,100,'UTF-8') ?>...</p>
                    </a>
                    <?php endforeach; ?>
                </div>
                
                <?php foreach($news->hot(2,1) as $items) : ?>
                <div class="slider3" style="width:180px; height:136px; overflow:hidden;">
                	<a href="<?= Url::to(['site/detail','id'=>$items->id,'slug'=>$items->slug]) ?>"><img height="136" src="<?= $items->images ?>" alt="MyPassion" /></a>
                    <p class="caption"><a href="<?= Url::to(['site/detail','id'=>$items->id,'slug'=>$items->slug]) ?>"><?= $items->name ?></a></p>
                </div>
                <?php endforeach; ?>
                
                
                
            </div>    
        </section>

