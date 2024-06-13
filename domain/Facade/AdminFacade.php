<?php

namespace domain\Facade;

use domain\Services\AdminService;
use Illuminate\Support\Facades\Facade;

class ProductFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AdminService::class;
    }
}
