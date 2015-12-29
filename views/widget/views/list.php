<?php
    use yii\helpers\Url;
?>

<h5 class="line"><span><?= $title ?>.</span></h5>
                        <div class="outerwide">
                            <ul class="block">
                            
                            <?php foreach($data as $item) : ?>
                                <li style="height:99px;  overflow:hidden;"> 
                                <div style="height:91px; overflow:hidden;">
                                    <a href="<?= Url::to(['site/detail' , 'id'=>$item->id , 'slug'=> $item->slug]) ?>">  
                                        <img src="<?= $item->images ?>" width="145px" alt="MyPassion" class="alignleft" />   
                                    </a>
                                    <p> 
                                        <a style="font-weight:bold; font-size:14px;" href="<?= Url::to(['site/detail','id'=>$item->id,'slug'=>$item->slug]) ?>"><?= $item->name ?></a> 
                                    </p>
                                    <p style="z-index:99999;"><?= $item->seo_title ?></p>
                                    </div>
                                    <span class=""><span style="width:80%;"></span></span>
                                    
                                </li>
                            <?php endforeach ?>
                                
                            </ul>
                        </div>