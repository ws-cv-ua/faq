<?php

use wscvua\adminltebox\BoxWidget;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\module\faq\models\Faq */

$this->title = 'F.A.Q record #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'F.A.Q', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-md-4">
        <?php BoxWidget::begin(['title' => 'Information']); ?>
        <p class="text-right">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'lang',
                'position',
            ],
        ]) ?>
        <?php BoxWidget::end(); ?>
    </div>
    <div class="col-md-8">
        <?php BoxWidget::begin(['title' => 'Main info', 'type' => BoxWidget::TYPE_PRIMARY]); ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'ask',
                'answer:html',
                'active:boolean',
            ],
        ]) ?>

        <?php BoxWidget::end(); ?>
    </div>
</div>

<div class="faq-view">




</div>
