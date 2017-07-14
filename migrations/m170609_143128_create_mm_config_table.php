<?php

use yii\db\Migration;

/**
 * Handles the creation of table `mm_config`.
 */
class m170609_143128_create_mm_config_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('mm_config', [
            'id' => $this->primaryKey(),
            'param' => $this->string()->notNull(),
            'value' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('mm_config');
    }
}
