<?php

namespace wscvua\faq\models;

use Yii;

/**
 * This is the model class for table "{{%faq}}".
 *
 * @property int $id
 * @property string $lang
 * @property string $ask
 * @property string $answer
 * @property int $position
 * @property int $active
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%faq}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ask', 'answer'], 'required'],
            [['answer'], 'string'],
            [['position', 'active'], 'integer'],
            [['lang'], 'string', 'max' => 10],
            [['ask'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang' => 'Lang',
            'ask' => 'Ask',
            'answer' => 'Answer',
            'position' => 'Position',
            'active' => 'Active',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)){

            if (!$this->position){
                $this->position = (int)self::find()->where([
                    'lang' => $this->lang
                ])->count() + 1;
            }

            return true;
        }
        return false;
    }
}
