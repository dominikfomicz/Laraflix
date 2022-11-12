<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Repository implements RepositoryInterface
{
    private string $modelClass;
    protected Model $model;
    protected Guard $auth;

	protected const DEFAULT_LIMIT = 10;

	/**
	 * @param string|null $modelClass
	 */
	public function __construct(?string $modelClass = null)
    {
        $this->modelClass = $modelClass ?: self::guessModelClass();
        $this->model = app($this->modelClass);
    }

	/**
	 * @return string
	 */
	private static function guessModelClass(): string
    {
        return preg_replace('/(.+)\\\\Repositories\\\\(.+)Repository$/m', '$1\Models\\\$2', static::class);
    }

	/**
	 * @param $id
	 * @return Model|null
	 */
	public function getOneById($id): ?Model
    {
        return $this->model->find($id);
    }

	/**
	 * @param array $ids
	 * @return Collection
	 */
	public function getByIds(array $ids): Collection
    {
        return $this->model->find($ids);
    }

	/**
	 * @return Collection
	 */
	public function getAll(): Collection
    {
        return $this->model->all();
    }

	/**
	 * @param ...$params
	 * @return Model|null
	 */
	public function getFirstWhere(...$params): ?Model
    {
        return $this->model->firstWhere(...$params);
    }

	/**
	 * @return string
	 */
	public function getModelClass(): string
    {
        return $this->modelClass;
    }
}
