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
            'from' => $this->string()->notNull(),
            'to' => $this->string()->notNull(),
            'subject' => $this->string()->notNull(),
            'body' => $this->text()->notNull(),
            'status' => $this->string(),
            'when' => $this->timestamp(),
        ]);
        
        // create index for faster queries
        $this->createIndex('idx_mm_email_status', 'mm_email', ['status']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('mm_email');
    }
}
