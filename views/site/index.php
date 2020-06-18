<?php

use aki\vue\Vue;
use \yii\web\JsExpression;

$this->title = 'Yii Vue App';

$color = 'blue';

?>

<?php Vue::begin([
    'id' => 'vue-app',
    'data' => [
        'message' => 'Hello Vue!',
        'cards' => $data,
        'color' => $color
    ],
    'methods' => [
        'helloWorld' => new JsExpression("function(color) {
            console.log(color);
        }")
    ]
]); ?>

<div clas="[ row ]">
    <div class="[ col-md-12 ]">
        <p>{{ message }}</p>

        <button
            class="[ btn btn-primary ]"
            v-on:click="helloWorld(color)"
        >
            Console Log
        </button>
    </div>
</div>

<div clas="[ row ]">
    <div
        class="[ col-md-3 ]"
        v-for="card in cards"
    >
        <?= $this->context->renderComponent('Card'); ?>
    </div>
</div>

<?php Vue::end(); ?>
