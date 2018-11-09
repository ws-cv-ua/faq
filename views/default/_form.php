<?php

use wscvua\adminltebox\BoxWidget;
use yii\helpers\Html;
use yii\redactor\widgets\Redactor;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\module\faq\models\Faq */
/* @var $form yii\widgets\ActiveForm */

BoxWidget::begin([
    'type' => BoxWidget::TYPE_PRIMARY,
    'title' => 'Params'
]);
?>

<div class="faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ask')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer')->widget(Redactor::className(), [
        'clientOptions' => [
            'plugins' => ['clips', 'fontcolor','imagemanager']
        ]
    ]); ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php BoxWidget::end(); ?>