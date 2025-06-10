<?php

declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultE72442c29930798e178b3df917d8ccdb extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('users')
        ->addColumn('id', 'text', ['nullable' => false, 'defaultValue' => null])
        ->addColumn('phone', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 255])
        ->addIndex(['phone'], ['name' => 'users_index_phone_6847c73f52b89', 'unique' => true])
        ->setPrimaryKeys(['id'])
        ->create();
    }

    public function down(): void
    {
        $this->table('users')->drop();
    }
}
