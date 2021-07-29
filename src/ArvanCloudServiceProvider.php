<?php


namespace Mohammadv184\ArvanCloud\Laravel;

use Illuminate\Support\ServiceProvider;
use Mohammadv184\ArvanCloud\Adapter\Http;
use Mohammadv184\ArvanCloud\Auth\ApiKey;
use Mohammadv184\ArvanCloud\Auth\UserToken;
use Mohammadv184\ArvanCloud\Services\Cdn\Cdn;

class ArvanCloudServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfig();
        $this->registerServices();
    }

    public function boot()
    {
        $this->publishAssets();
    }

    private function registerServices()
    {
        foreach (config("arvancloud.map") as $service => $class) {
            $this->app->singleton($service, function () use ($service, $class) {
                $config = config("arvancloud");
                $serviceConfig = $config['services'][$service];
                $auth = $config['auth']['default'] === "ApiKey"
                    ? new ApiKey($config['auth']['ApiKey'])
                    : new UserToken($config['auth']['UserToken']);
                $baseUrl = $serviceConfig['baseUrl'];

                $http = new Http($auth, $baseUrl, $class);
                return new $class($http, $serviceConfig);
            });
        }
    }

    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__."/../config/arvancloud.php",
            "arvancloud"
        );
    }

    private function publishAssets()
    {
        $this->publishes([
            __DIR__."/../config/arvancloud.php" => config_path("arvancloud.php")
        ]);
    }
}
