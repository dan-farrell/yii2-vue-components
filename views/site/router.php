<?php

use aki\vue\Vue;
use aki\vue\VueRouter;
use aki\vue\VueComponent;

$this->title = 'Yii App Router';

?>

<?php Vue::begin([
    'id' => "vue-app",
    'vueRouter'=> VueRouter::widget([
        'routes' => [
            [
                'path' => '/foo',
                'component' => new VueComponent([
                    'template' => '@vueroot/views/foo.php',
                    'components' => [
                        'yoo-component'=> new VueComponent([
                            'template' => '<div>yoo!!! {{id}}</div>',
                            'props' => [
                                'id'
                            ]
                        ])
                    ],
                ])
            ],
            [
                'path' => '/bar',
                'component' => new VueComponent([
                    'template' => '<div>hello</div>'
                ])
            ]
        ]
    ])
]); ?>

    <router-link to="/foo">Go to Foo</router-link>
    <router-link to="/bar">Go to Bar</router-link>

    <!-- route outlet -->
    <?= VueRouter::$outlet ?><!-- <router-view></router-view> -->
<?php Vue::end(); ?>