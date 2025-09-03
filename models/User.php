<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $use_id
 * @property string $use_email
 * @property string $use_pass
 * @property string $use_nome
 * @property string $use_tipo
 * @property string $use_telefone
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Pedido[] $pedidos
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $rememberMe = true;
    public function p($t="", $d=false){
        echo "<pre>";
        print_r($t);
        if($d) die;
        echo "</pre>";
    }

    /**
     * ENUM field values
     */
    const USE_TIPO_ADM = 'adm';
    const USE_TIPO_USER = 'user';

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
            [['use_email','use_nome', 'use_tipo', 'use_telefone'], 'required'],
            [['use_tipo'], 'string'],
            [['use_email'], 'string', 'max' => 100],
            [['use_pass', 'use_nome'], 'string', 'max' => 255],
            [['use_telefone'], 'string', 'max' => 15],
            [['auth_key', 'access_token'], 'string', 'max' => 200],
            ['use_tipo', 'in', 'range' => array_keys(self::optsUseTipo())],
            [['use_email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'use_id' => 'UsID',
            'use_email' => 'Email',
            'use_pass' => ' Pass',
            'use_nome' => 'Nome',
            'use_tipo' => 'Tipo',
            'use_telefone' => 'Telefone',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::class, ['use_id' => 'use_id']);
    }


    /**
     * column use_tipo ENUM value labels
     * @return string[]
     */
    public static function optsUseTipo()
    {
        return [
            self::USE_TIPO_ADM => 'adm',
            self::USE_TIPO_USER => 'user',
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
    public function isUseTipoUser()
    {
        return $this->use_tipo === self::USE_TIPO_USER;
    }

    public function setUseTipoToUser()
    {
        $this->use_tipo = self::USE_TIPO_USER;
    }
    ##implemtaçao na interface


 public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

      /**
     * Localiza uma identidade pelo ID informado
     *
     * @param string|int $id o ID a ser localizado
     * @return IdentityInterface|null o objeto da identidade que corresponde ao ID informado
     */
    public static function findIdentity($id)
    {
        return static::findOne(['use_id' => $id]);
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
        return $this->use_id;
    }

    /**
     * @return string a chave de autenticação do usuário atual
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

   

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)){          
            if ($this->isNewRecord || $this->isAttributeChanged('use_pass')) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
                $this->access_token = \Yii::$app->security->generateRandomString();
                $this->use_pass =  sha1($this->use_pass);                         
                return true;
            }
        return false;
        }
    }
    


    public function login_($p)
    {
       
        $user = static::findOne(['use_email' => $p['User']['use_email']]);               

        
        if ($user && (sha1($p["User"]["use_pass"]) == $user->use_pass)){
            Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);

            return true;
        }
        return false;

    }   
    
}
