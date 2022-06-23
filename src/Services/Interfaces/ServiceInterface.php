<?php

namespace Baimo\Core\Services\Interfaces;

use Illuminate\Http\Request;

interface ServiceInterface
{
    /**
     * 对应的方法和控制器保持一致,为了增加可读性，可以指定增加一个前缀。
     * 同时每个函数的意义和控制器保持一致。
     * 每个函数的参数都是当前请求的参数，具体的业务处理在函数中处理[这里个人也没想到怎么传递参数较好，欢迎大家提出解决方案。]
     */

    /**
     * @param Request $requestParams 请求参数
     * @return array
     */
    public function serviceIndex(Request $requestParams): array;

    /**
     * @param Request $requestParams 请求参数
     * @return bool
     */
    public function serviceCreate(Request $requestParams): bool;

    /**
     * @param Request $requestParams 请求参数
     * @return bool
     */
    public function serviceStore(Request $requestParams): bool;

    /**
     * @param Request $requestParams 请求参数
     * @return array
     */
    public function serviceShow(Request $requestParams): array;

    /**
     * @param Request $requestParams 请求参数
     * @return int
     */
    public function serviceEdit(Request $requestParams): int;

    /**
     * @param Request $requestParams 请求参数
     * @return int
     */
    public function serviceUpdate(Request $requestParams): int;

    /**
     * @param array $requestParams 请求参数
     * @return int
     */
    public function serviceDestroy(array $requestParams): int;
}