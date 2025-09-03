<?php

namespace tests\unit\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        verify($user = User::findIdentity(100))->notEmpty();
        verify($user->username)->equals('admin');

        verify(User::findIdentity(999))->empty();
    }

    public function testFindUserByAccessToken()
    {
        verify($user = User::findIdentityByAccessToken('100-token'))->notEmpty();
        verify($user->username)->equals('admin');

        verify(User::findIdentityByAccessToken('non-existing'))->empty();        
    }

    public function testFindUserByUsername()
    {
        verify($user = User::findByUsername('admin'))->notEmpty();
        verify(User::findByUsername('not-admin'))->empty();
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser()
    {
        $user = User::findByUsername('admin');
        verify($user->validateAuthKey('test100key'))->notEmpty();
        verify($user->validateAuthKey('test102key'))->empty();

        verify($user->validatePassword('admin'))->notEmpty();
        verify($user->validatePassword('123456'))->empty();        
    }

}
public function testUserTipoAdmAndCliente()
{
    $user = new User([
        'use_email' => 'adm@site.com',
        'pass' => '123',
        'use_nome' => 'Administrador',
        'use_tipo' => User::USE_TIPO_ADM,
        'telefone' => '11999999999'
    ]);
    verify($user->isUseTipoAdm())->true();
    verify($user->isUseTipoCliente())->false();

    $user->setUseTipoToCliente();
    verify($user->isUseTipoCliente())->true();
    verify($user->isUseTipoAdm())->false();

    $user->setUseTipoToAdm();
    verify($user->isUseTipoAdm())->true();
}

public function testOptsUseTipo()
{
    $opts = User::optsUseTipo();
    verify($opts)->arrayHasKey(User::USE_TIPO_ADM);
    verify($opts)->arrayHasKey(User::USE_TIPO_CLIENTE);
    verify($opts[User::USE_TIPO_ADM])->equals('adm');
    verify($opts[User::USE_TIPO_CLIENTE])->equals('cliente');
}

public function testDisplayUseTipo()
{
    $user = new User(['use_tipo' => User::USE_TIPO_CLIENTE]);
    verify($user->displayUseTipo())->equals('cliente');
    $user->use_tipo = User::USE_TIPO_ADM;
    verify($user->displayUseTipo())->equals('adm');
}

public function testAttributeLabels()
{
    $user = new User();
    $labels = $user->attributeLabels();
    verify($labels)->arrayHasKey('use_id');
    verify($labels)->arrayHasKey('use_email');
    verify($labels)->arrayHasKey('pass');
    verify($labels)->arrayHasKey('use_nome');
    verify($labels)->arrayHasKey('use_tipo');
    verify($labels)->arrayHasKey('telefone');
}

public function testRules()
{
    $user = new User();
    $rules = $user->rules();
    verify($rules)->notEmpty();
    $requiredFields = array_column(array_filter($rules, function($rule) {
        return in_array('required', $rule, true);
    }), 0);
    verify($requiredFields)->contains('use_email');
    verify($requiredFields)->contains('pass');
    verify($requiredFields)->contains('use_nome');
    verify($requiredFields)->contains('use_tipo');
    verify($requiredFields)->contains('telefone');
}

public function testBeforeSaveSetsAuthKeyOnInsert()
{
    $user = $this->make(User::class, [
        'isNewRecord' => true,
        'auth_key' => null
    ]);
    \Yii::$app->security = $this->makeEmpty(\yii\base\Security::class, [
        'generateRandomString' => 'randomkey'
    ]);
    $user->beforeSave(true);
    verify($user->auth_key)->equals('randomkey');
}