<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepo
{
    /**
     * @var
     */
    protected $model;

    /**
     * BaseRepo constructor.
     */
    public function __construct()
    {
        $this->model = $this->getModel();
    }

    /**
     * @return mixed
     */
    abstract public function getModel();

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data)
    {

        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param Int $id
     * @return mixed
     */
    public function findOrFail(Int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @return int
     */
    public function getTotalRecords(): int
    {
        return $this->model->count();
    }


    /**
     * @param array $ids
     * @return mixed
     */
    public function findByIds(array $ids): mixed
    {
        return $this->model
            ->whereIn('id', $ids)
            ->get();
    }

    /**
     * @param Model $model
     * @param int $limit
     * @param int $page
     * @param string $sortField
     * @param string $sortOrder
     * @return mixed
     */
    public function searchLogs(Model $model, int $limit = 20, int $page = 1, string $sortField = 'created_at', string $sortOrder = 'desc')
    {
        $qry = $model->logs()
            ->orderBy($sortField, $sortOrder);

        return $qry->paginate($limit, ['*'], 'page', $page);
    }

    /**
     * @param Model $model
     * @return array
     */
    public function prepareContentLog(Model $model): array
    {
        return [];
    }
}
