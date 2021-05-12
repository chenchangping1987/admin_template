<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateMenuTable extends Migrator
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
        $table = $this->table('menu');

        $table->addColumn('title', 'string', ['limit'=>100,'default'=>'', 'comment' => '菜单名称'])
            ->addColumn('url_path', 'string', ['limit'=>100,'default'=>'','comment'=>'菜单路径'])
            ->addColumn('icon','string',['limit'=>100,'default'=>'','comment'=>'菜单图标'])
            ->addColumn('sort', 'integer', ['limit'=>11,'default'=>100,'comment'=>'菜单排序'])
            ->addColumn('pid','integer',['limit'=>11,'default'=>0,'comment'=>'上级菜单'])
            ->addColumn('status','boolean',['limit'=>1,'default'=>1,'comment'=>'状态'])
            ->addIndex('title')
            ->addIndex('sort')
            ->addIndex('pid')
            ->addIndex('status')
            ->create();
    }
}
