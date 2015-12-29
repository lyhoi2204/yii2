<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Adslinks */

$this->title = 'Create Adslinks';
$this->params['breadcrumbs'][] = ['label' => 'Adslinks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adslinks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
