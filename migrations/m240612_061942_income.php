<?php

use yii\db\Migration;

/**
 * Class m240612_061942_income
 */
class m240612_061942_income extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('income_tab', [
            'id'=> $this->primaryKey(),
            'title'=> $this->string(255)->notNull(),
            'amount'=> $this->integer()->notNull(),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
            'created_by'=>$this->integer()->notNull(),
            'updated_by'=>$this->integer()->notNull(),
        ]);

        $this->addForeignKey('FK_income', 'income_tab','created_by','user','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_income','income_tab');
        $this->dropTable('income_tab');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240612_061942_income cannot be reverted.\n";

        return false;
    }
    */
}
