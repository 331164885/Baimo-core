<?php

namespace Baimo\Core\Repositories\Interfaces;

use Illuminate\Http\Request;

interface RepositoryInterface
{
    /**
     * 对应的方法和Service层保持一致,为了增加可读性，可以指定增加一个前缀。
     * 同时每个函数的意义和Service保持一致。
     */

    /**
     * 数据查询
     *
     * @param \Closure $closure 查询闭包条件
     * @param int $perSize 分页大小
     * @return array 查询结果数据
     */
    public function repositoryIndex(\Closure $closure, int $perSize): array;

    /**
     * 创建数据
     *
     * @param Request $createInfo 创建信息
     * @return int 新增ID
     */
    public function repositoryCreate(Request $createInfo): int;

    /**
     * 创建数据
     *
     * @param Request $createInfo 创建信息
     * @return int 新增ID
     */
    public function repositoryStore(Request $createInfo): int;

    /**
     * 查询数据
     *
     * @param \Closure $closure 查询闭包条件
     * @return array 查询结果数据
     */
    public function repositoryShow(\Closure $closure): array;

    /**
     * 查询数据(一般用于数据回显)
     *
     * @param \Closure $closure 查询闭包条件
     * @return array
     */
    public function repositoryEdit(\Closure $closure): array;

    /**
     * 更新数据
     *
     * @param Request $updateInfo 更新数据
     * @param array $updateWhere 更新条件
     * @return int 更新行数
     */
    public function repositoryUpdate(Request $updateInfo, array $updateWhere): int;

    /**
     * 逻辑删除数据
     *
     * @param array $deleteWhere 删除条件
     * @return int 删除行数
     */
    public function repositoryDestroy(array $deleteWhere): int;
}