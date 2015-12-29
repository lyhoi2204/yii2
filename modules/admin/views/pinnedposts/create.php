<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pinnedposts */

$this->title = 'Create Pinnedposts';
$this->params['breadcrumbs'][] = ['label' => 'Pinnedposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pinnedposts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
