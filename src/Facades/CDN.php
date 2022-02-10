<?php

namespace Mohammadv184\ArvanCloud\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Mohammadv184\ArvanCloud\Services\Cdn\Endpoints\Cache;
use Mohammadv184\ArvanCloud\Services\Cdn\Endpoints\Dns;
use Mohammadv184\ArvanCloud\Services\Cdn\Endpoints\Domain;
use Mohammadv184\ArvanCloud\Services\Cdn\Endpoints\Ssl;

/**
 * Class CDN.
 *
 * @method static Cache  cache(string $domain = null)
 * @method static Dns    dns(string $domain = null)
 * @method static Domain domain(string $domain = null)
 * @method static Ssl    ssl(string $domain = null)
 */
class CDN extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cdn';
    }
}
