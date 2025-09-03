<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Foto $model */

$this->title = 'Update Foto: ' . $model->fot_id;
$this->params['breadcrumbs'][] = ['label' => 'Fotos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fot_id, 'url' => ['view', 'fot_id' => $model->fot_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="foto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
