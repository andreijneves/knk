<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AdmController extends Controller
{
    /**
     * Exibe a página inicial da área administrativa.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'adm.php';
        return $this->render('index');
    }
}