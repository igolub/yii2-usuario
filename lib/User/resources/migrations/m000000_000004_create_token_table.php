<?php


class m000000_000004_create_token_table extends \yii\db\Migration
{
    public function up()
    {
        $this->createTable(
            '{{%token}}',
            [
                'user_id' => $this->integer(),
                'code' => $this->string(32)->notNull(),
                'type' => $this->smallInteger(6)->notNull(),
                'created_at' => $this->integer()->notNull()
            ]
        );

        $this->createIndex('idx_token_user_id_code_type', '{{%token}}', ['user_id', 'code', 'type'], true);

        $this->addForeignKey('fk_token_user', '{{%token}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%token}}');
    }
}
