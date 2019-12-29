<?php

namespace AlexSchmidhuber\FavoriteList\Facades;

use Illuminate\Support\Facades\Facade;

class FavoriteList extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'favoritelist';
    }
}
