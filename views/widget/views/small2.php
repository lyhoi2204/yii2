<div class="column-one-third">

                        <h5 class="line"><span><?= $title ?>.</span></h5>
                        <div class="outertight m-r-no">
                            <ul class="block">
                            <?php foreach($data as $item ) : ?>
                                <li style="height:91px; overflow:hidden;">
                                <div style="height:91px; overflow:hidden;">
                                    <a href="#"><img style="width:145px;" src="<?= $item->images ?>" alt="MyPassion" class="alignleft" /></a>
                                    <p>
                                        <span><?= date("Y-m-d",$item->created_at) ?></span>
                                        <a href="<?= yii\helpers\Url::to(['site/detail' , 'id'=>$item->id , 'slug'=> $item->slug]) ?>"><?= $item->name ?></a>
                                    </p>
                                    <span class=""><span style="width:80%;"></span></span>
                                </div>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                        
                    </div>