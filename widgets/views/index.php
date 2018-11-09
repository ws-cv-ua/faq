<?php
/**
 * @var $this \yii\web\View
 * @var $items array
 */

use yii\data\ArrayDataProvider;

echo \yii\widgets\ListView::widget([
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
    'summary' => '<thead>' .
        '<tr>' .
        '<th class="date">Date</th>' .
        '<th class="amount">Amount</th>' .
        '<th class="detail">Detail</th>' .
        '<th class="confirm">Confirmation (s)</th>' .
        '</tr>' .
        '</thead>',
    'layout' => "{items}\n" .
        "{pager}",
]);