<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto_variacao".
 *
 * @property int $id
 * @property int $produto_id
 * @property string $nome
 * @property string $valor
 * @property float|null $preco_adicional
 * @property string|null $criado_em
 * @property string|null $atualizado_em
 *
 * @property PedidoItem[] $pedidoItems
 * @property Produto $produto
 */
class ProdutoVariacao extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto_variacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preco_adicional'], 'default', 'value' => 0.00],
            [['produto_id', 'nome', 'valor'], 'required'],
            [['produto_id'], 'integer'],
            [['preco_adicional'], 'number'],
            [['criado_em', 'atualizado_em'], 'safe'],
            [['nome', 'valor'], 'string', 'max' => 100],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['produto_id' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'produto_id' => 'Produto ID',
            'nome' => 'Nome',
            'valor' => 'Valor',
            'preco_adicional' => 'Preco Adicional',
            'criado_em' => 'Criado Em',
            'atualizado_em' => 'Atualizado Em',
        ];
    }

    /**
     * Gets query for [[PedidoItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoItems()
    {
        return $this->hasMany(PedidoItem::class, ['produto_variacao_id' => 'id']);
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::class, ['ID' => 'produto_id']);
    }

}
