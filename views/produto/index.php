<?php

use app\models\Produto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;





/** @var yii\web\View $this */
/** @var app\models\ProdutoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['produto/index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'nome',
            'descricao:ntext',
            'preco',
            'criado_em',
            //'atualizado_em',
            [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view} {update} {delete} {variacoes} {fotos}', // nomes dos botões
    'buttons' => [
        'variacoes' => function ($url, $model, $key) {
            $customUrl = Url::to(['produto-variacao/index', 'idProduto' => $model->ID]);
            return Html::a('<i class="bi bi-gear-fill"></i>', $customUrl, [
                'title' => 'Variações do produto',
                'data-pjax' => '0',
            ]);
        },
        'fotos' => function ($url, $model, $key) {
            $customUrl = Url::to(['foto/index', 'idProduto' => $model->ID]);
            return Html::a('<i class="bi bi-camera-fill"></i>', $customUrl, [
                'title' => 'fotos do produto',
                'data-pjax' => '0',
            ]);
        },
    ],
]
        ],
    ]); ?>


</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
