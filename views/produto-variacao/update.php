<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProdutoVariacao $model */

$this->title = 'Update Produto Variacao: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Produto Variacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produto-variacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
