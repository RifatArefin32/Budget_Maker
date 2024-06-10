<?php

use yii\db\Migration;

/**
 * Class m240610_095810_budget
 */
class m240610_095810_budget extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('expense', [
            'id'=> $this->primaryKey(),
            'title'=> $this->string(255)->notNull(),
            'amount'=> $this->integer(11)->notNull()->defaultValue(0),
            'spent'=> $this->integer(11)->notNull()->defaultValue(0),
            'remianing'=> $this->integer(11)->notNull()->defaultValue(0),
            'created_at'=> $this->integer()->notNull()->defaultValue(0),
            'updated_at'=> $this->integer()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('expense');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240610_095810_budget cannot be reverted.\n";

        return false;
    }
    */
}
