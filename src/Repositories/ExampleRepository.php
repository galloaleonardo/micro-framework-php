<?php

declare(strict_types=1);

namespace MiniFramework\Repositories;

use Medoo\Medoo;

class ExampleRepository
{
    const TABLE_NAME = 'example';
    const TABLE_PK = 'example_id';

    private Medoo $db;

    public function __construct()
    {
        $this->db = new Medoo([
            'type' => getenv('DATABASE_TYPE'),
            'host' => getenv('DATABASE_HOST'),
            'port' => getenv('DATABASE_PORT'),
            'database' => getenv('DATABASE_NAME'),
            'username' => getenv('DATABASE_USERNAME'),
            'password' => getenv('DATABASE_PASSWORD')
        ]);
    }

    public function index()
    {
        return $this->db->select(self::TABLE_NAME, '*');
    }

    public function get(int $id)
    {
        return $this->db->select(self::TABLE_NAME, '*', [
            self::TABLE_PK => $id
        ]);
    }

    public function store(array $data)
    {
        return $this->db->insert(self::TABLE_NAME, $data);
    }

    public function update(int $id, array $data)
    {
        return $this->db->update(self::TABLE_NAME, $data, [
            self::TABLE_PK => $id
        ]);
    }

    public function delete(int $id)
    {
        return $this->db->delete(self::TABLE_NAME, [
            self::TABLE_PK, $id
        ]);
    }
}
