<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProdutoVariacao $model */

$this->title = 'Create Produto Variacao';
$this->params['breadcrumbs'][] = ['label' => 'Produto Variacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-variacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
