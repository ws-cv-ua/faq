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
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
    </div>
</div>