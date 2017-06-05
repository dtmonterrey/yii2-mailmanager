<?php

use yii\db\Migration;

/**
 * Handles the creation of table `mm_email`.
 */
class m170601_132616_create_mm_email_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('mm_email', [
            'id' => $this->primaryKey(),
            'from' => $this->email()->string()->notNull(),
            'to' => $this->string()->notNull(),
            'subject' => $this->string()->notNull(),
            'body' => $this->text()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('mm_email');
    }
}
