<?php

namespace Baimo\Core\Facades;

use Illuminate\Support\Facades\Facade;

class Baimo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Baimo';
    }
}