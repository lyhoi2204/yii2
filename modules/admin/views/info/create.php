<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = 'Create Info';
$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content-container">  

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
