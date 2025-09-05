<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $ID
 * @property string $nome
 * @property string|null $descricao
 * @property float $preco
 * @property string|null $criado_em
 * @property string|null $atualizado_em
 *
 * @property PedidoItem[] $pedidoItems
 * @property ProdutoVariacao[] $produtoVariacaos
 */
class Produto extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'default', 'value' => null],
            [['nome', 'preco'], 'required'],
            [['descricao'], 'string'],
            [['preco'], 'number'],
            [['criado_em', 'atualizado_em'], 'safe'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
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
        return $this->hasMany(PedidoItem::class, ['produto_id' => 'ID']);
    }

    /**
     * Gets query for [[ProdutoVariacaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoVariacaos()
    {
        return $this->hasMany(ProdutoVariacao::class, ['produto_id' => 'ID']);
    }

}
