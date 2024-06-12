<?php

namespace domain\Facade;

use domain\Services\ProductService;
use Illuminate\Support\Facades\Facade;

class ProductFacade extends Facade
{
 protected static function getFacadeAccessor()
 {
    return ProductService::class;
 }

}
