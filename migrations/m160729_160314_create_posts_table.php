<?php

use yii\db\Migration;

/**
 * Handles the creation for table `posts`.
 */
class m160729_160314_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('posts', [
            'id'        => $this->primaryKey(),
            'title'     => $this->string()->notNull(),
            'content'   => $this->text()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('posts');
    }
}
