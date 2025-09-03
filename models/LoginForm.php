<?php

namespace app\models;
use app\models\User;
use Yii;
/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends User
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }   
    
    function login()
    {
        if ($this->validate()) {
            print_r($this->getUser());
            print_r($this);
            die('aqui');
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findIdentity($this->username);
            print_r($this->_user);
            die('não...');
        }
        return $this->_user;
    }
    
    
}


