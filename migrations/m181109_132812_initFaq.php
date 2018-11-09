<?php

use yii\db\Migration;

/**
 * Class m181109_132812_initFaq
 */
class m181109_132812_initFaq extends Migration
{
    public function tableName()
    {
        return '{{%faq}}';
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName(), [
            'id' => $this->primaryKey(),
            'lang' => $this->string('10'),
            'ask' => $this->string(255),
            'answer' => $this->text(),
            'position' => $this->integer(),
            'active' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181109_132812_initFaq cannot be reverted.\n";

        return false;
    }
    */
}
