<?php

use Phinx\Migration\AbstractMigration;

class FileInstallMigration extends AbstractMigration
{
    public function up()
    {
        // Create tables:
        $this->createFile();

        // Add foreign keys:
        $table = $this->table('file');

        if (!$table->hasForeignKey('user_id')) {
            $table->addForeignKey('user_id', 'user', 'id', ['delete' => 'SET_NULL', 'update' => 'CASCADE']);
            $table->save();
        }
    }

    protected function createFile()
    {
        $table = $this->table('file', ['id' => false, 'primary_key' => ['id']]);

        if (!$this->hasTable('file')) {
            $table->addColumn('id', 'char', ['limit' => 32, 'null' => false]);
            $table->create();
        }

        if (!$table->hasColumn('scope')) {
            $table->addColumn('scope', 'string', ['limit' => 50, 'null' => true, 'default' => null]);
        }

        if (!$table->hasColumn('filename')) {
            $table->addColumn('filename', 'string', ['limit' => 250, 'null' => true, 'default' => null]);
        }

        if (!$table->hasColumn('title')) {
            $table->addColumn('title', 'string', ['limit' => 250, 'null' => true, 'default' => null]);
        }

        if (!$table->hasColumn('mime_type')) {
            $table->addColumn('mime_type', 'string', ['limit' => 50, 'null' => true, 'default' => null]);
        }

        if (!$table->hasColumn('extension')) {
            $table->addColumn('extension', 'string', ['limit' => 10, 'null' => true, 'default' => null]);
        }

        if (!$table->hasColumn('created_date')) {
            $table->addColumn('created_date', 'datetime', ['null' => true, 'default' => null]);
        }

        if (!$table->hasColumn('updated_date')) {
            $table->addColumn('updated_date', 'datetime', ['null' => true, 'default' => null]);
        }

        if (!$table->hasColumn('user_id')) {
            $table->addColumn('user_id', 'integer', ['signed' => false, 'null' => true, 'default' => null]);
        }

        if (!$table->hasColumn('size')) {
            $table->addColumn('size', 'integer', ['signed' => false, 'null' => true, 'default' => null]);
        }

        if (!$table->hasColumn('meta')) {
            $table->addColumn('meta', 'text', ['null' => true, 'default' => null]);
        }

        if (!$table->hasIndex('user_id')) {
            $table->addIndex('user_id', ['unique' => false]);
        }

        $table->save();

        $table->changeColumn('scope', 'string', ['limit' => 50, 'null' => true, 'default' => null]);
        $table->changeColumn('filename', 'string', ['limit' => 250, 'null' => true, 'default' => null]);
        $table->changeColumn('title', 'string', ['limit' => 250, 'null' => true, 'default' => null]);
        $table->changeColumn('mime_type', 'string', ['limit' => 50, 'null' => true, 'default' => null]);
        $table->changeColumn('extension', 'string', ['limit' => 10, 'null' => true, 'default' => null]);
        $table->changeColumn('created_date', 'datetime', ['null' => true, 'default' => null]);
        $table->changeColumn('updated_date', 'datetime', ['null' => true, 'default' => null]);
        $table->changeColumn('user_id', 'integer', ['signed' => false, 'null' => true, 'default' => null]);
        $table->changeColumn('size', 'integer', ['signed' => false, 'null' => true, 'default' => null]);
        $table->changeColumn('meta', 'text', ['null' => true, 'default' => null]);

        $table->save();
    }
}
