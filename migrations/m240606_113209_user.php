<?php

use yii\db\Migration;

/**
 * Class m240606_113209_user
 */
class m240606_113209_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("user", [
            "id"=> $this->primaryKey(),
            "username"=> $this->string(255)->notNull(),
            "email"=> $this->string(255)->notNull(),
            "password"=> $this->string(255)->notNull(),
            "password_reset_token"=> $this->string(255)->notNull(),
            "auth_key"=> $this->string(255)->notNull(),
            "verification_key"=> $this->string(255)->notNull(),
            "created_at"=> $this->integer(11)->notNull(),
            "updated_at"=> $this->integer(11)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable("user");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240606_113209_user cannot be reverted.\n";

        return false;
    }
    */
}
