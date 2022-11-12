<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    /**
     * @param $id
     * @return Model|null
     */
    public function getOneById($id): ?Model;

    /**
     * @param  array  $ids
     * @return Collection
     */
    public function getByIds(array $ids): Collection;

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @return LengthAwarePaginator|array
     */
    public function getPaginated(): LengthAwarePaginator|array;
}
