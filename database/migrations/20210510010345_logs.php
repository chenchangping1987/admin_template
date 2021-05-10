<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Logs extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('logs', ['id' => true, 'primary_key' => ['id']]);
        $table->addColumn('info', 'string', ['limit' => 2000,'default' => '', 'comment' => '记录内容'])
        ->addColumn('ip', 'string', ['limit' => 50, 'default' => '', 'comment' => 'IP地址'])
        ->addColumn('user_id', 'integer', ['limit' => 11, 'default' => 0, 'comment' => '管理员ID'])
        ->addColumn('create_time', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'comment' => '记录时间'] )
        ->create();
    }
}
