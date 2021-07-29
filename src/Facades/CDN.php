<?php

namespace Mohammadv184\ArvanCloud\Laravel\Facades;
use Illuminate\Support\Facades\Facade;

class CDN extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cdn';
    }
}