<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.11.2018
 * Time: 20:06
 */

namespace wscvua\faq\widgets;


use wscvua\faq\models\Faq;
use Yii;
use yii\base\Widget;

class FaqWidget extends Widget
{
    public $language;

    public $listOptions = [];

    protected $items = [];

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        if (!$this->language){
            $this->language = Yii::$app->language;
        }

        $this->items = Faq::find()->where([
            'lang' => $this->language,
            'active' => 1
        ])->orderBy('position')->all();
    }

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub

        return $this->render('index', [
            'items' => $this->items
        ]);
    }

}