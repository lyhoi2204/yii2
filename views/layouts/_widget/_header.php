<?php
use yii\helpers\Url;
use app\models\Categories;
use app\models\Type;
use app\helpers\MyDefine;
?>



<header id="header">






            <div class="container">
                <div class="column">
                    <div class="logo">
                        <a href="/"><img src="/frontend/img/logo.png" alt="MyPassion" /></a>
                    </div>
                    
                    <div class="search">
                        <form action="/search.html">
                            <input type="text" name="keyword" value="Search." onblur="if(this.value=='') this.value='Search.';" onfocus="if(this.value=='Search.') this.value='';" class="ft"/>
                            <input type="submit" value="" class="fs">
                        </form>
                    </div>
                    
                    <!-- Nav -->
                    <nav id="nav">
                        <ul class="sf-menu sf-js-enabled">
                            <li <?php if(!Yii::$app->request->get('id')) : echo 'class="current"'; endif; ?>><a href="/">Home.</a></li>


                            <?php foreach (Categories::find()->orderBy(['updated_at'=>SORT_DESC])->all() as $item) : ?>
                            <li <?php if($item->id == Yii::$app->request->get('id') && !Yii::$app->request->get('type')) : echo 'class="current"' ; endif; ?>>
                            	<a href="<?php echo Url::to(['site/category', 'slug' => $item->slug, 'id' => $item->id]) ?>"><?= $item->name ?></a>
                                
                                <ul style="width:200px;">
                                    <?php foreach (Type::find()->where(['category_id'=>$item->id,'display'=>MyDefine::yes])->all() as $rows) : ?>
                                        
                                        <li><i class="icon-right-open"></i><a href="<?php echo Url::to(['site/type','type' => $rows->slug, 'slug' => $item->slug, 'id' => $rows->id]) ?>"><?= $rows->name ?></a></li>
                                        
                                    <?php endforeach; ?>
                                </ul>
                                
                            </li>

                            <?php endforeach; ?>

                            
                        </ul>
                        
                    </nav>




                    <!-- /Nav -->
                </div>
            </div>
        </header>