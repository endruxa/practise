<?php
namespace App\Alias;

use Illuminate\Support\Facades\Facade;

class FlachFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flach';
    }
}