<?php

/**
 * yii2  swagger ui 3.0  openapi 2.0
 */

namespace lengbin\swagger;

use Yii;
use yii\base\Action;
use yii\web\Response;

/**
 *
 * ~~~
 * public function actions()
 * {
 *     return [
 *         'index' => [
 *             'class' => 'lengbin\swagger\SwaggerAction',
 *             'url' => Url::to(['doc/api'], true),
 *             'urls' => [
 *                          Url::to(['doc/api'], true),
 *                          Url::to(['doc/api2'], true),
 *                       ],   // if more
 *             'httpAuth' => ['account' => 'password'], // http auth
 *         ]
 *     ];
 * }
 * ~~~
 */
class SwaggerAction extends Action
{
    /**
     * @var string The rest url configuration.
     */
    public $url;

    /**
     * @var array support url array
     */
    public $urls;

    /**
     * @var array  http auth  ['account' => 'password'],
     */
    public $httpAuth;

    /**
     * @var array The OAuth configration
     */
    public $oauthConfiguration = [];

    /**
     *
     * @param $httpAuthUser
     */
    protected function httpAuthCheck()
    {
        if (empty($this->httpAuth)) {
            return;
        }
        // 如果没登录发送 http 验证请求
        if ((!isset($_SERVER['PHP_AUTH_USER'])) || (!isset($_SERVER['PHP_AUTH_PW']))) {
            header('WWW-Authenticate: Basic realm="My Private Stuff"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Authorization Required.';
            exit;
        } else { // 如果登录了 php 会在 $_SERVER 中存储登录的帐号和密码
            $loginInfo = [$_SERVER['PHP_AUTH_USER'] => $_SERVER['PHP_AUTH_PW']];
            if (!in_array($loginInfo, $this->httpAuth)) { // 检查用户名和密码
                header('WWW-Authenticate: Basic realm="My Private Stuff"');
                header('HTTP/1.0 401 Unauthorized');
                echo 'Authorization Required.';
                exit;
            }
        }
    }

    public function run()
    {
        $this->httpAuthCheck();

        Yii::$app->getResponse()->format = Response::FORMAT_HTML;

        $this->controller->layout = false;

        $view = $this->controller->getView();

        if (empty($this->oauthConfiguration)) {
            $this->oauthConfiguration = [
                'clientId'                    => 'your-client-id',
                'clientSecret'                => 'your-client-secret-if-required',
                'realm'                       => 'your-realms',
                'appName'                     => 'your-app-name',
                'scopeSeparator'              => ' ',
                'additionalQueryStringParams' => [],
            ];
        }

        return $view->renderFile(__DIR__ . '/swagger.php', [
            'url'         => $this->url,
            'urls'        => $this->urls,
            'oauthConfig' => $this->oauthConfiguration,
        ], $this->controller);
    }
}
