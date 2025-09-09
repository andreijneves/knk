<?php
namespace  bestyii\bootstrap\icons\assets;


use yii\web\AssetBundle;
use yii\web\View;

class BootstrapIconAsset extends AssetBundle
{

    public $sourcePath = '@npm/bootstrap-icons/font';

    public $js = [
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    public $css = [
        'bootstrap-icons.css',
    ];
}