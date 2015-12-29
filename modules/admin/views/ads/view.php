<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Adslinks */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Adslinks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adslinks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'title',
            'images',
            'url:url',
            'view_count',
            'location',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
