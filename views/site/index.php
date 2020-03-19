<?php

use aki\vue\Vue;

$this->title = 'Yii Vue App';

?>

<div class="row">
    <?php Vue::begin([
        'id' => 'vue-app',
        'data' => [
            'cards' => $data
        ]
    ]); ?>

    <div class="col-md-3" v-for="card in cards">
        <?= $this->context->renderComponent('Card'); ?>
    </div>

    <?php Vue::end(); ?>
</div>
