<?php
/**
 * @var $this \yii\web\View
 * @var $items array
 * @var $listOptions array
 */

use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

echo \yii\widgets\ListView::widget(ArrayHelper::merge([
    'dataProvider' => new ArrayDataProvider([
        'allModels' => $items
    ]),
    'itemView' => '_item',
    'options' => [
        'id' => 'ws-faq',
        'class' => 'accordion'
    ],
    'itemOptions' => [
        'tag' => 'div',
    ],
    'layout' => "{items}\n{pager}",
], $listOptions));