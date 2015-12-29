<?php use app\models\News; ?>
<div class="pager">
                            <ul>
                                <li><a href="?page=1" class="first-page"></a></li>
                                <?php
                                    
                                    if(Yii::$app->request->get('page')==null or Yii::$app->request->get('page')<1) : $page = 1;
                                    else : $page = Yii::$app->request->get('page');
                                    endif;
                                    $min = Yii::$app->request->get('page')-5;
                                    $max = Yii::$app->request->get('page')+5;

                                    if($min <= 1) : $min = 1; endif;
                                    if($max >= $maxpage) : $max = $maxpage; endif;
                                    for($i = $min; $i<=$max ; $i++)
                                    {
                                 ?>
                                <li><a <?php if($i==$page) : echo "class='active'" ; endif; ?> href="?page=<?= $i ?>"><?= $i ?></a></li>
                                <?php } ?>
                                
                                <li><a href="?page=<?php echo $maxpage ?>" class="last-page"></a></li>
                            </ul>
                        </div>