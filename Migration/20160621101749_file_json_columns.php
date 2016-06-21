<?php

use Phinx\Migration\AbstractMigration;

class FileJsonColumns extends AbstractMigration
{
    public function up()
    {
        $this->execute("UPDATE file SET meta = '{}' WHERE meta = '' OR meta IS NULL");
        $this->table('file')
            ->changeColumn('meta', \Phinx\Db\Adapter\AdapterInterface::PHINX_TYPE_JSON, ['null' => false])
            ->save();
    }
}
