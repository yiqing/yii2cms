<?php

use yii\db\Schema;
use yii\db\Migration;

class m150307_085438_create_article_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%article}}', [
            'id' => Schema::TYPE_PK,
            'category_id' => Schema::TYPE_INTEGER ." NOT NULL DEFAULT '0'",
            'user_id' => Schema::TYPE_INTEGER .' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'slug' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT . ' NOT NULL',
            'comments_count' => Schema::TYPE_INTEGER ." NOT NULL DEFAULT '0'",
            'meta_title' => Schema::TYPE_STRING,
            'meta_description' => Schema::TYPE_STRING,
            'meta_keywords' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
        $this->createIndex('article_title_unique', '{{%article}}', 'title', true);
        $this->createIndex('article_slug_unique', '{{%article}}', 'slug', true);
        $this->createIndex('article_category_id_index', '{{%article}}', 'category_id');

        if ($this->db->driverName === 'mysql') {
           // $this->addForeignKey('category_article_f', '{{%category}}', 'id', '{{%article}}', 'category_id','CASCADE');
            $this->addForeignKey('article_category_f', '{{%article}}', 'category_id', '{{%category}}', 'id','CASCADE');

        }
    }


}
