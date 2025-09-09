<?php

use app\models\ProdutoVariacao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\rodutoVariacaoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Variações';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['produto/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-variacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>      
        <?= Html::a('Nova variacao do produto', ['create', 'idProduto'=>$idProduto], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'produto_id',
            'nome',
            'valor',
            'preco_adicional',
            //'criado_em',
            //'atualizado_em',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProdutoVariacao $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
