<?php

use yii\db\Migration;

/**
 * Handles adding when to table `mm_email`.
 */
class m170809_130930_add_when_column_to_mm_email_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('mm_email', 'when', $this->timestamp());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('mm_email', 'when');
    }
}
