<?php

/*
 * This file is part of the light/yii2-swagger.
 *
 * (c) lichunqiang <light-li@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace lengbin\swagger;

use Yii;
use yii\base\Action;
use yii\web\Response;

/**
 * The api data output action.
 *
 * ~~~
 * public function actions()
 * {
 *     return [
 *         'api' => [
 *             'class' => 'lengbin\swagger\SwaggerApiAction',
 *             'scanDir' => [
 *                 Yii::getAlias('@api/swagger'),
 *                 Yii::getAlias('@api/modules/v1/controllers'),
 *                 ...
 *             ]
 *         ]
 *     ];
 * }
 * ~~~
 */
class SwaggerApiAction extends Action
{
    /**
     * @var string|array|\Symfony\Component\Finder\Finder The directory(s) or filename(s).
     * If you configured the directory must be full path of the directory.
     */
    public $scanDir;

    /**
     * @var array The options passed to `Swagger`, Please refer the `Swagger\scan` function for more information.
     */
    public $scanOptions = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->initCors();

        Yii::$app->response->format = Response::FORMAT_JSON;

        return $this->getSwagger();
    }

    /**
     * Init cors.
     */
    protected function initCors()
    {
        $headers = Yii::$app->getResponse()->getHeaders();

        $headers->set('Access-Control-Allow-Headers', 'Content-Type, api_key, Authorization');
        $headers->set('Access-Control-Allow-Methods', 'GET, POST, DELETE, PUT');
        $headers->set('Access-Control-Allow-Origin', '*');
        $headers->set('Allow', 'OPTIONS,HEAD,GET');
    }

    /**
     * Get swagger object
     *
     * @return \Swagger\Annotations\Swagger
     */
    protected function getSwagger()
    {
        return \Swagger\scan($this->scanDir, $this->scanOptions);
    }
}
