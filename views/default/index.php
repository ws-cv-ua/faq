<?php

use kartik\grid\GridView;
use kartik\grid\SerialColumn;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\widgets\Pjax;
use wscvua\adminltebox\BoxWidget;
/* @var $this yii\web\View */
/* @var $dataProviders[] yii\data\ActiveDataProvider */
/* @var $languages array */

$this->title = 'F.A.Q';
$this->params['breadcrumbs'][] = $this->title;

//BoxWidget::begin();
//BoxWidget::end();
?>

<div class="nav-tabs-custom" style="cursor: move;">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs pull-right ui-sortable-handle">
        <?php
        foreach ($languages as $k => $language){
            echo Html::tag('li', Html::a(strtoupper($language), '#block-' . $language, [
                'data-toggle' => 'tab',
            ]), [
                'class' => $k ? '' : 'active'
            ]);
        }
        ?>
        <li class="pull-left header"><i class="fa fa-question-circle"></i> List of FAQ</li>
    </ul>
    <div class="tab-content">
        <?php
        foreach ($languages as $k => $language){
            echo Html::beginTag('div', [
                'id' => 'block-' . $language,
                'class' => ['tab-pane', $k ? '' : 'active']
            ]);

            echo Html::tag('p', Html::a('Create new item', ['create', 'lang' => $language], ['class' => 'btn btn-success']));

            echo GridView::widget([
                'dataProvider' => $dataProviders[$language],
                'columns' => [
                    ['class' => SerialColumn::className()],
                    'ask',
                    'position',
                    'active:boolean',
                    ['class' => ActionColumn::className(), 'template' => '{up} {down}', 'buttons' => [
                        'up' => function($index, $model){
                            return Html::a(Html::tag('span', null, ['class' => 'glyphicon glyphicon-arrow-up']), ['up', 'id' => $model->id]);
                        },
                        'down' => function($index, $model){
                            return Html::a(Html::tag('span', null, ['class' => 'glyphicon glyphicon-arrow-down']), ['down', 'id' => $model->id]);
                        },
                    ]],
                    ['class' => ActionColumn::className()]
                ]
//                ''
            ]);
            echo Html::endTag('div');
        }
        ?>
    </div>
</div>