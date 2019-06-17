<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii2 Swagger Ui 3.0 Extension</h1>
    <br>
</p>

[swagger-php](https://github.com/zircote/swagger-php) intergation with yii2.


Integration [swagger-ui](https://github.com/swagger-api/swagger-ui) with [swagger-php](https://github.com/zircote/swagger-php).


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require lengbin/yii2-swagger "*"
```

or add

```
"lengbin/yii2-swagger": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Configure two action as below:

```
//The scan directories, you should use real path there.
DocController.php

public function actions()
{
    return [
        'doc' => [
            'class' => 'lengbin\swagger\SwaggerAction',
            'url' => \yii\helpers\Url::to(['/doc/api'], true),
            //if more url
            'urls' => [
                \yii\helpers\Url::to(['/doc/api'], true),
                \yii\helpers\Url::to(['/doc/api2'], true),
            ],
            //'httpAuth' => ['account' => 'password'], // http auth
        ],
        'api' => [
            'class' => 'light\swagger\SwaggerApiAction',
            'scanDir' => [
                Yii::getAlias('@api/swagger'),
                Yii::getAlias('@api/modules/v1/controllers'),
            ],
        ],
    ];
}
```

extension
----

You can use Gii to quickly generate swaager openapi 2.0  extension [yii-gii-swagger](https://github.com/ice-leng/yii-gii-swagger).


