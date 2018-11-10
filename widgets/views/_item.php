<?php
/**
 * @var $model \common\module\faq\models\Faq
 * @var $index integer
 */

//echo $model->ask;
?>

<div class="card">
    <div class="header">
        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-<?= $index; ?>" aria-expanded="true" aria-controls="collapseOne">
            <?= $model->ask; ?>
        </button>
    </div>
    <div id="collapse-<?= $index; ?>" class="collapse <?= $index ? '' : 'show' ?>" aria-labelledby="headingOne">
        <div class="card-body">
            <?= $model->answer; ?>
        </div>
    </div>
</div>