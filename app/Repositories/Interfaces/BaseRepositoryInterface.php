<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function pagination(int $perpage=10,array $condition=[],array $fieldSearch=[]);
    public function paginate( int $perpage=10);
    public function paginate2( int $perpage=10,array $condition=[],array $fieldSearch=[]);
    public function getAll();
    public function findById(int $id);
    public function create(array $create=[]);
    public function update(int $id,array $update=[]);
    public function delete(int $id=0);
}