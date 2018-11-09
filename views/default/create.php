<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\module\faq\models\Faq */

$this->title = 'New F.A.Q item (' . strtoupper(Yii::$app->request->get('lang')) . ')';
$this->params['breadcrumbs'][] = ['label' => 'Faqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
    'model' => $model,
]);