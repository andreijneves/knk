Bootstrap v4 Icons 
============


安装 Installation
------------

通过 [composer](http://getcomposer.org/download/)安装.

项目中直接运行

```
php composer.phar require bestyii/yii2-bootstrap-icons
```

或者添加下面代码到 `composer.json`文件

```
"bestyii/yii2-bootstrap-icons": "*"
```


使用 Usage
-----

Once the extension is installed, simply use it in your code by  :

You set url, where locate json file OR set path for scan

```php

class ThemeAsset extends AssetBundle
{
    public $css = [
    ];

    public $js = [
    ];

    public $depends = [
        BootstrapIconAsset::class
    ];
```

OR

```php
BootstrapIconAsset::register($this);
```
