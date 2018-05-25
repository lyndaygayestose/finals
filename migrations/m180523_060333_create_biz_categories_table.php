<?php

use yii\db\Migration;

/**
 * Handles the creation of table `biz_categories`.
 */
class m180523_060333_create_biz_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('biz_categories', [
            'id' => $this->primaryKey(),
            'business_id' => $this->integer(10)->notNull(),
            'category_id' => $this->integer(20)->notNull()
        ]);

        $this->createIndex(
            'idx-biz_categories-business_id',
            'biz_categories','business_id'
        );

        $this->addForeignKey(
            'fk-biz_categories-businesses',
            'biz_categories','business_id',
            'businesses','id'
        );

        $this->createIndex(
            'idx-biz_categories-category_id',
            'biz_categories','category_id'
        );

        $this->addForeignKey(
            'fk-biz_categories-categories',
            'biz_categories','category_id',
            'categories','id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-biz_categories-businesses','biz_categories');
        $this->dropForeignKey('fk-biz_categories-categories','biz_categories');
        $this->dropIndex('idx-biz_categories-business_id','biz_categories');
        $this->dropIndex('idx-biz_categories-category_id','biz_categories');
        $this->dropTable('biz_categories');
    }
}
