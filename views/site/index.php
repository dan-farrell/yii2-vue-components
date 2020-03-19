<?php

use aki\vue\Vue;
use \yii\web\JsExpression;

$this->title = 'Yii Vue App';

?>

<?php Vue::begin([
    'id' => 'vue-app',
    'data' => [
        'message' => 'Hello Vue!',
        'cards' => $data
    ],
    'methods' => [
        'reverseMessage' => new JsExpression("function() {this.message = this.message.split('').reverse().join('')}")
    ]
]); ?>

<div clas="row">
    <div class="col-md-12">
        <p>{{ message }}</p>
        <button class="btn btn-primary" v-on:click="reverseMessage">Reverse Message</button>
    </div>
</div>

<div clas="row">
    <div class="col-md-3" v-for="card in cards">
        <?= $this->context->renderComponent('Card'); ?>
    </div>
</div>

<?php Vue::end(); ?>
