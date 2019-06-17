<?php

namespace lengbin\swagger;

use yii\web\AssetBundle;
use yii\web\View;

class SwaggerUIAsset extends AssetBundle
{
    public $sourcePath = '@vendor/swagger-api/swagger-ui/dist';

    public $js = [
        'swagger-ui-bundle.js',
        'swagger-ui-standalone-preset.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    public $css = [
        'swagger-ui.css',
    ];
}