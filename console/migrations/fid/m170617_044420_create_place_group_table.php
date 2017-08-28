<?php

use  console\migrations\fid\components\Migration;

/**
 * Handles the creation of table `place`.
 */
class m170617_044420_create_place_group_table extends Migration
{
    const TABLE_NAME = '{{%place_group}}';

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
            'active' => $this->boolean()->notNull()->defaultValue(true),
        ]);
        $this->addPrimaryKeyWithAutoGeneratedName(self::TABLE_NAME,'id');
        $this->addForeignKeyWithAutoGeneratedName(self::TABLE_NAME,'parent_group_id',self::TABLE_NAME,'id');        
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