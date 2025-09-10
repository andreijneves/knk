<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\BootstrapAsset; // Importe o asset principal do Bootstrap (CSS)
use yii\bootstrap\BootstrapPluginAsset; // Importe o asset dos plugins JavaScript do Bootstrap



AppAsset::register($this);


$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
</head>
<body class="d-flex flex-column h-100 bg-dark">
<?php $this->beginBody() ?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="?">KNK Traning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse right" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?r=site/nos">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?r=site/servicos">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?r=site/contato">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">fotos</a>
                    </li>
                    <li class="nav-item"><a href="/?r=adm" class="nav-link">admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
   <?=$content ?>

</section>

<footer class="footer-bg text-center">
    <div class="container">
        <p>Copyright © 2025 - Todos os direitos reservados.</p>
    </div>
</footer>
</html>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
