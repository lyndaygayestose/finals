<?php

use yii\db\Migration;

/**
 * Handles the creation of table `businesses`.
 */
class m180523_054220_create_businesses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('businesses', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'address' => $this->string(50)->notNull(),
            'city' => $this->string(30)->notNull(),
            'telephone' => $this->string(20)->notNull()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('businesses');
    }
}
