# Bootstrap Icons Assets

Yii3 Asset bundle for the Bootstrap Icons

[![Packagist Version](https://img.shields.io/packagist/v/yiirocks/yii-bootstrap-icons.svg)](https://packagist.org/packages/yiirocks/yii-bootstrap-icons)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/yiirocks/yii-bootstrap-icons.svg)](https://php.net/)
[![Packagist](https://img.shields.io/packagist/dt/yiirocks/yii-bootstrap-icons.svg)](https://packagist.org/packages/yiirocks/yii-bootstrap-icons)
[![GitHub](https://img.shields.io/github/license/yiirocks/yii-bootstrap-icons.svg)](https://github.com/yiirocks/yii-bootstrap-icons/blob/master/LICENSE)

## Installation

The package could be installed via composer:

```bash
composer require yiirocks/yii-bootstrap-icons
```

## Usage

```php
use YiiRocks\Yii\Bootstrap\Icons\Assets\BootstrapIconsAsset;

$assetManager->register(
    BootstrapIconsAsset::class,
);
```

## Unit testing

The package is tested with [Psalm](https://psalm.dev/) and [PHPUnit](https://phpunit.de/). To run tests:

```bash
composer psalm
composer phpunit
```

[![Maintainability](https://qlty.sh/gh/YiiRocks/projects/yii-bootstrap-icons/maintainability.svg)](https://qlty.sh/gh/YiiRocks/projects/yii-bootstrap-icons)
[![Codacy branch grade](https://img.shields.io/codacy/grade/41c0fc9e1e244d1292f7ba51b6ed1065/master.svg)](https://app.codacy.com/gh/YiiRocks/svg-inline-fontawesome)
![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/YiiRocks/yii-bootstrap-icons/phpunit.yml?branch=master)
