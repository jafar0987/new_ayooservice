<?php

namespace App\Models\Traits;

trait CrudTraits
{
    /**
     * @param array $where
     * @param array $with
     * @param array $withCount
     * @param array $order
     * @param null $limit
     * @param array $whereIn
     * @param array $orWhere
     * @param array $select
     * @param array $groupBy
     * @param array $whereNotIn
     * @return mixed
     */
    public static function findData(
        $where = [], $with = [], $withCount = [], $order = [], $limit = null, $whereIn = [], $orWhere = [], $select = [],
        $groupBy = [], $whereNotIn = []
    )
    {
        $static = self::search($where, $with, $withCount, $order, $limit, $whereIn, $orWhere, $select, $groupBy, $whereNotIn);

        return $static->first();
    }

    /**
     * @param array $where
     * @param array $with
     * @param array $withCount
     * @param array $order
     * @param null $limit
     * @param array $whereIn
     * @param array $orWhere
     * @param array $select
     * @param array $groupBy
     * @param array $whereNotIn
     * @return mixed
     */
    public static function findAllData(
        $where = [], $with = [], $withCount = [], $order = [], $limit = null, $whereIn = [], $orWhere = [], $select = [],
        $groupBy = [], $whereNotIn = []
    )
    {
        $static = self::search($where, $with, $withCount, $order, $limit, $whereIn, $orWhere, $select, $groupBy, $whereNotIn);

        return $static->get();
    }

    /**
     * @param array $where
     * @param array $with
     * @param array $withCount
     * @param array $order
     * @param null $limit
     * @param array $whereIn
     * @param array $orWhere
     * @param int $paginate
     * @param array $select
     * @param array $groupBy
     * @param array $whereNotIn
     * @return mixed
     */
    public static function findPaginateData(
        $where = [], $with = [], $withCount = [], $order = [], $limit = null, $whereIn = [], $orWhere = [], $paginate = 10,
        $select = [], $groupBy = [], $whereNotIn = []
    )
    {
        $static = self::search($where, $with, $withCount, $order, $limit, $whereIn, $orWhere, $select, $groupBy,$whereNotIn);

        return $static->paginate($paginate);
    }

    /**
     * @param  array  $params
     * @return mixed
     */
    public static function storeData($params = [])
    {
        return (new static)::create($params);
    }

    /**
     * @param  array  $where
     * @param  array  $params
     * @return mixed
     */
    public static function updateData($where = [], $params = [])
    {
        (new static)::where($where)
            ->update($params);

        return self::findData($where);
    }

    /**
     * @param  array  $where
     * @return mixed
     */
    public static function deleteData($where = [])
    {
        return (new static)::where($where)
            ->delete();
    }

    /**
     * @param $where
     * @param $with
     * @param $withCount
     * @param $order
     * @param $limit
     * @param $whereIn
     * @param $orWhere
     * @param $select
     * @param $groupBy
     * @param $whereNotIn
     * @return mixed
     */
    public static function search($where, $with, $withCount, $order, $limit, $whereIn, $orWhere, $select, $groupBy, $whereNotIn)
    {
        $static = (new static)::where($where);

        if (count($select) > 0) {
            $static = $static->select($select);
        }

        if (count($with) > 0) {
            $static = $static->with($with);
        }

        if (count($withCount) > 0) {
            $static = $static->withCount($withCount);
        }

        if (count($order) > 0) {
            foreach ($order as $orders) {
                $static = $static->orderBy($orders['key'], $orders['value']);
            }
        }

        if ($limit !== null) {
            $static = $static->limit($limit);
        }

        if (count($whereIn) > 0) {
            foreach ($whereIn as $whereIns) {
                $static = $static->whereIn($whereIns['key'], $whereIns['value']);
            }
        }
        if (count($orWhere) > 0) {
            $static = $static->orWhere($orWhere);
        }

        if (count($groupBy) > 0) {
            $static = $static->groupBy($groupBy);
        }

        if (count($whereNotIn) > 0) {
            foreach ($whereNotIn as $whereNotIns) {
                $static = $static->whereNotIn($whereNotIns['key'], $whereNotIns['value']);
            }
        }

        return $static;
    }
}
