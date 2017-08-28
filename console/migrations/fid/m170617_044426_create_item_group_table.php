<?php

use  console\migrations\fid\components\Migration;

/**
 * Handles the creation of table `item`.
 */
class m170617_044426_create_item_group_table extends Migration
{
    const TABLE_NAME = '{{%item_group}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTableWithBlameAndTimestamp(self::TABLE_NAME, [
            'id' => $this->bigInteger()->notNull(),
            'name' => $this->string()->notNull()->unique(),
            'description' => $this->string(),
            'parent_group_id' => $this->bigInteger(),
            'identification1_name' => $this->string(),
            'identification2_name' => $this->string(),
            'identification3_name' => $this->string(),
            'identification4_name' => $this->string(),
            'identification5_name' => $this->string(),
            'active' => $this->boolean()->notNull()->defaultValue(true),
        ]);
        $this->addPrimaryKeyWithAutoGeneratedName(self::TABLE_NAME,'id');
        $this->addForeignKeyWithAutoGeneratedName(self::TABLE_NAME,'parent_group_id',self::TABLE_NAME,'id'); 
        $this->addCommentOnColumn(self::TABLE_NAME, 'identification1_name', 'ชื่อของข้อมูลยืนยันสิ่งของ 1');
        $this->addCommentOnColumn(self::TABLE_NAME, 'identification2_name', 'ชื่อของข้อมูลยืนยันสิ่งของ 2');
        $this->addCommentOnColumn(self::TABLE_NAME, 'identification3_name', 'ชื่อของข้อมูลยืนยันสิ่งของ 3');
        $this->addCommentOnColumn(self::TABLE_NAME, 'identification4_name', 'ชื่อของข้อมูลยืนยันสิ่งของ 4');
        $this->addCommentOnColumn(self::TABLE_NAME, 'identification5_name', 'ชื่อของข้อมูลยืนยันสิ่งของ 5');
        $this->addCommentOnActiveColumn(self::TABLE_NAME);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}