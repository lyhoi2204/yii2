<?php use yii\helpers\Url; ?>

                    	<h5 class="line">
                        	<span><?= $title ?>.</span>
                            <div class="navbar">
                                <a id="next2" class="next" href="#"><span></span></a>	
                                <a id="prev2" class="prev" href="#"><span></span></a>
                            </div>
                        </h5>
                        
                        <div class="outerwide" >
                        	<ul class="wnews" id="carousel2">
                            <?php foreach($data as $item ) : ?>
                                
                            	<li style="height:172px; overflow:hidden;">
                                <div style="height:162px; overflow:hidden;">
                                	<a href="<?= Url::to(['site/detail' , 'id'=>$item->id , 'slug'=> $item->slug]) ?>"><img width="300" src="<?= $item->images ?>" alt="MyPassion" class="alignleft" /></a>
                                    <a href="<?= Url::to(['site/detail' , 'id'=>$item->id , 'slug'=> $item->slug]) ?>"><h6 class="regular"><?= $item->name ?>.</h6></a>
                                    <p><?= $item->seo_title ?></p>
                                    </div>

                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="outerwide">
                        	<ul class="block2">
                            <?php foreach($data2 as $item ) : ?>
                                <li style="height:106px; overflow:hidden;">
                                <div style="height:86px; overflow:hidden;">
                                    <a href="<?= Url::to(['site/detail' , 'id'=>$item->id , 'slug'=> $item->slug]) ?>"><img width="140" src="<?= $item->images ?>" alt="MyPassion" class="alignleft" /></a>
                                    <p>
                                        <a href="<?= Url::to(['site/detail' , 'id'=>$item->id , 'slug'=> $item->slug]) ?>"><?= $item->name ?></a>
                                    </p>
                                    <span class=""><span style="width:80%;"></span></span>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
       