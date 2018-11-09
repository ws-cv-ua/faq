<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\module\faq\models\Faq */

$this->title = 'Update Faq: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'F.A.Q', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

echo $this->render('_form', [
    'model' => $model,
]);