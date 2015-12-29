<?php
use app\models\Type;
use yii\helpers\Url;
use app\helpers\MyDefine;

?>

<div class="column-one-fourth">
                    <h5 class="line"><span>Danh mục.</span></h5>
                    <ul class="footnav">
                        <?php foreach (Type::find()->where(['display'=>MyDefine::yes])->asArray()->all() as $item) : ?>
                            <li style="margin-bottom:-5px;" <?php if($item['id'] == Yii::$app->request->get('id') && Yii::$app->request->get('type')) : echo "class='current'"; endif; ?> >
                                <a href="<?php echo Url::to(['site/type', 'slug' => Yii::$app->request->get('slug'), 'type' => $item['slug'], 'id' => $item['id']]) ?>"><?= $item['name'] ?></a>                                
                            </li><br />
                         <?php endforeach; ?> 
                    </ul>
                </div>
                    <!-- /Nav -->