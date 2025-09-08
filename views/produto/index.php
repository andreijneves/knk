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
    'template' => '{view} {update} {delete} {customButton}', // Add your custom button name here
    'buttons' => [
        'customButton' => function ($url, $model, $key) {
            // $url, $model, $key are automatically passed to the callback
            $customUrl = Url::to(['produto-variacao/index', 'idProduto' => $model->ID]);
            return Html::a('<span>[v]</span>', $customUrl, [
                'title' => 'Perform Custom Action',
                'data-pjax' => '0',
            ]);
        },
    ],
]
        ],
    ]); ?>


</div>
