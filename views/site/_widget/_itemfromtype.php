 <!-- World News -->
<?php
use app\models\News;
use app\models\Type;
use yii\helpers\Url;


?>
            <?php foreach(Type::all() as $itemtype) : ?>
                    <div class="column-two-third">
                        <h5 class="line">
                            <span><?= $itemtype->name ?></span>
                            <div class="navbar">
                                <a id="next2" class="next" href="#"><span></span></a>   
                                <a id="prev2" class="prev" href="#"><span></span></a>
                            </div>
                        </h5>
                        
                        <div class="outerwide" >
                            <ul class="wnews" id="carousel2">
                            <?php foreach(News::fromType($itemtype->id) as $item) : ?>
                                <li>
                                    <img src="<?= $item->images ?>" width="300" height="162" alt="MyPassion" class="alignleft" />
                                    <h6 class="regular"><a href="#"><?= $item->name ?></a></h6>
                                    <span class="meta"><?= date("Y-m-d",$item->created_at) ?>.   \\   <a href="#">World News.</a>   \\   <a href="#">No Coments.</a></span>
                                    <p>....</p>
                                </li>
                            <?php endforeach; ?>
                                
                            </ul>
                        </div>



                        
                        <div class="outerwide">
                            <ul class="block2">
                                <li>
                                    <a href="#"><img src="/frontend/img/trash/17.png" alt="MyPassion" class="alignleft" /></a>
                                    <p>
                                        <span>26 May, 2013.</span>
                                        <a href="#">Blandit Rutrum, Erat et Sagittis.</a>
                                    </p>
                                    <span class="rating"><span style="width:80%;"></span></span>
                                </li>
                                
                            </ul>
                        </div>
                    </div>

                <?php endforeach; ?>
                    <!-- /World News -->
                    