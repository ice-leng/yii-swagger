<?php

\lengbin\swagger\SwaggerUIAsset::register($this);

/** @var string $rest_url */
/** @var array $oauthConfig */
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Swagger UI 3.0</title>
        <?php $this->head() ?>
        <style>
            html {
                box-sizing: border-box;
                overflow: -moz-scrollbars-vertical;
                overflow-y: scroll;
            }

            *,
            *:before,
            *:after {
                box-sizing: inherit;
            }

            body {
                margin: 0;
                background: #fafafa;
            }
        </style>
        <script type="text/javascript">
            window.onload = function() {
                // Begin Swagger UI call region
                const ui = SwaggerUIBundle({
                    url: "<?= $url?>",
                    urls: <?= $urls?>,
                    dom_id: '#swagger-ui',
                    deepLinking: true,
                    presets: [
                        SwaggerUIBundle.presets.apis,
                        SwaggerUIStandalonePreset
                    ],
                    plugins: [
                        SwaggerUIBundle.plugins.DownloadUrl
                    ],
                    filter: '',
                    layout: "StandaloneLayout"
                });
                // End Swagger UI call region

                window.ui = ui;

                ui.initOAuth(<?= json_encode($oauthConfig) ?>);
            }
        </script>
    </head>
    <body>
    <?php $this->beginBody() ?>
        <div id="swagger-ui"></div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
