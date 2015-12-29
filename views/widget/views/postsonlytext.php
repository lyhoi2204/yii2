<?php use yii\helpers\Url; ?>


<div class="sidebar">
                    	<div id="tabs">
                            <ul>
                                <li><a href="#tabs1"><?= $title ?>.</a></li>
                            </ul>
                            <div id="tabs1">
                                <ul>
                                <?php foreach($data as $item) : ?>
                                	<li>
                                    	<a href="<?= Url::to(['site/detail' , 'id'=>$item->id , 'slug'=> $item->slug]) ?>" class="title"><?= $item->name ?></a>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
