<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function pagination(array $param=[],);
    public function getAll();
    public function findById(int $id);
    public function create(array $create=[]);
    public function update(int $id,array $update=[]);
    public function delete(int $id=0);
}