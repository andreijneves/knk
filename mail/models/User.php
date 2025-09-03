<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $use_id
 * @property string $use_email
 * @property string $pass
 * @property string $use_nome
 * @property string $use_tipo
 * @property string $telefone
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * ENUM field values
     */
    const USE_TIPO_ADM = 'adm';
    const USE_TIPO_CLIENTE = 'cliente';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['use_email', 'pass', 'use_nome', 'use_tipo', 'telefone'], 'required'],
            [['use_tipo'], 'string'],
            [['use_email'], 'string', 'max' => 100],
            [['pass', 'use_nome'], 'string', 'max' => 255],
            [['telefone'], 'string', 'max' => 15],
            ['use_tipo', 'in', 'range' => array_keys(self::optsUseTipo())],
            [['pass'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'use_id' => 'User ID',
            'use_email' => 'User Email',
            'pass' => 'User Senha ',
            'use_nome' => 'User Nome',
            'use_tipo' => 'User Tipo',
            'telefone' => 'UserTelefone',
        ];
    }


    /**
     * column use_tipo ENUM value labels
     * @return string[]
     */
    public static function optsUseTipo()
    {
        return [
            self::USE_TIPO_ADM => 'adm',
            self::USE_TIPO_CLIENTE => 'cliente',
        ];
    }

    /**
     * @return string
     */
    public function displayUseTipo()
    {
        return self::optsUseTipo()[$this->use_tipo];
    }

    /**
     * @return bool
     */
    public function isUseTipoAdm()
    {
        return $this->use_tipo === self::USE_TIPO_ADM;
    }

    public function setUseTipoToAdm()
    {
        $this->use_tipo = self::USE_TIPO_ADM;
    }

    /**
     * @return bool
     */
    public function isUseTipoCliente()
    {
        return $this->use_tipo === self::USE_TIPO_CLIENTE;
    }

    public function setUseTipoToCliente()
    {
        $this->use_tipo = self::USE_TIPO_CLIENTE;
    }

    public function findByUsername($use_email)
    {
        return self::find()->where(['use_email' => $use_email])->one();
    }

    /**
     * Localiza uma identidade pelo ID informado
     *
     * @param string|int $id o ID a ser localizado
     * @return IdentityInterface|null o objeto da identidade que corresponde ao ID informado
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Localiza uma identidade pelo token informado
     *
     * @param string $token o token a ser localizado
     * @return IdentityInterface|null o objeto da identidade que corresponde ao token informado
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string o ID do usuário atual
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string a chave de autenticação do usuário atual
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool se a chave de autenticação do usuário atual for válida
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
