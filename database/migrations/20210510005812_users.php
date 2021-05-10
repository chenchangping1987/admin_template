<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Users extends Migrator
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
        $table  =  $this->table('users', ['id' => true, 'primary_key' => ['id']]);
        $table->addColumn('username', 'string',array('limit'  =>  20,'default'=>'','comment'=>'管理员登陆名称'))
        ->addColumn('password', 'string',array('limit'  =>  150,'default'=>'','comment'=>'管理员密码')) 
        ->addColumn('mobile', 'string', ['limit' => 20, 'default' => '0', 'comment' => '手机号码'])
        ->addColumn('status', 'boolean',array('limit'  =>  1,'default'=>1,'comment'=>'登陆状态0 禁用 1 启用'))
        ->addColumn('create_time', 'timestamp', array('default'=>'CURRENT_TIMESTAMP','comment'=>'添加时间'))
        ->addColumn('update_time', 'timestamp', array('default'=>'CURRENT_TIMESTAMP','comment'=>'更新时间'))
        ->addIndex(array('username'), array('unique'  =>  true))
        ->create();
    }
}
