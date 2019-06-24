<?php

/**
 * yii2  swagger ui 3.0  openapi 2.0
 */

namespace lengbin\swagger;

use Yii;
use yii\base\Action;
use yii\base\UserException;
use yii\helpers\Json;
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
 *                          ['name' => 'xx', 'url' => Url::to(['doc/api2'], true)],
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
            if ($loginInfo !== $this->httpAuth) {
                header('WWW-Authenticate: Basic realm="My Private Stuff"');
                header('HTTP/1.0 401 Unauthorized');
                echo 'Authorization Required.';
                exit;
            }
        }
    }

    public function init()
    {
        parent::init();
        if (!empty($this->urls)) {
            if (!is_array($this->urls)) {
                throw new UserException('Urls must array');
            }
            foreach ($this->urls as $key => $url) {
                if (is_string($url)) {
                    $this->urls[$key] = ['name' => $url, 'url' => $url];
                } else {
                    if (empty($url['url']) || empty($url['name'])) {
                        throw new UserException('Urls format is invalid，format ["name" => "xxx", "url" => "xxx"]');
                    }
                }
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
            'urls'        => Json::encode($this->urls),
            'oauthConfig' => $this->oauthConfiguration,
        ], $this->controller);
    }
}
