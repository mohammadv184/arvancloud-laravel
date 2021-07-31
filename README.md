<p align="center"><img src="resources/images/arvan-logo.svg" alt="ArvanCloud"></p>


# Laravel ArvanCloud API


[![Latest Stable Version](http://poser.pugx.org/mohammadv184/arvancloud-laravel/v)](https://packagist.org/packages/mohammadv184/arvancloud-laravel)
[![Total Downloads](http://poser.pugx.org/mohammadv184/arvancloud-laravel/downloads)](https://packagist.org/packages/mohammadv184/arvancloud-laravel)
[![Latest Unstable Version](http://poser.pugx.org/mohammadv184/arvancloud-laravel/v/unstable)](https://packagist.org/packages/mohammadv184/arvancloud-laravel)
[![Build Status](https://www.travis-ci.com/mohammadv184/arvancloud-laravel.svg?branch=main)](https://www.travis-ci.com/mohammadv184/arvancloud-laravel)
[![License](http://poser.pugx.org/mohammadv184/arvancloud-laravel/license)](https://packagist.org/packages/mohammadv184/arvancloud-laravel)



Laravel Package for the ArvanCloud API.
This package supports `PHP 7.3+`.

For PHP integration you can use [mohammadv184/arvancloud](https://github.com/mohammadv184/arvancloud) package.


# List of contents

- [Laravel ArvanCloud API](#Laravel-ArvanCloud-API)
- [List of contents](#list-of-contents)
- [List of services](#list-of-services)
    - [Install](#install)
    - [Configure](#configure)
    - [How to use service](#how-to-use-service)
        - [CDN](#CDN)
    - [Credits](#credits)
    - [License](#license)

# List of services
- [CDN](https://www.arvancloud.com/en/products/cdn) :heavy_check_mark:
- [Vod](https://www.arvancloud.com/en/products/video-platform) :hourglass:
- [iaas](https://www.arvancloud.com/en/products/cloud-computing) :hourglass:
- [VAds](https://www.arvancloud.com/en/products/video-ads) :hourglass:

## Install

Via Composer

``` bash
composer require mohammadv184/arvancloud-laravel
```
## Configure
If you are using `Laravel 5.5` or higher then you don't need to add the provider and alias. (Skip to b)

a. In your `config/app.php` file add these two lines.

```php
// In your providers array.
'providers' => [
    ...
    Mohammadv184\ArvanCloud\Laravel\ArvanCloudServiceProvider::class,
],

// In your aliases array.
'aliases' => [
    ...
    'CDN' => Mohammadv184\ArvanCloud\Laravel\ArvanCloudServiceProvider::class,
],
```

b. then run `php artisan vendor:publish` to publish `config/arvancloud.php` file in your config directory.

In the config file you can set the Config to be used for all your Service and you can also change the Config at runtime.

Choose what Authentication type you would like to use in your application.

```php
    'auth'=> [
        'default'  => 'ApiKey', //Set default Auth Type
        'UserToken'=> '',
        'ApiKey'   => '',//User API Key available in arvancloud panel
    ],
    ...
```

Then fill the credentials for that Service in the services array.

```php
'services' => [
    'cdn' => [
        'baseUrl'  => 'https://napi.arvancloud.com/cdn/4.0/',
        'domain'   => 'your_domain.com',// Fill in the credentials here.
        'endpoints'=> [...],
    ],
    ...
]
    ...   
```

## How to use service

How to use ArvanCloud Services.

### CDN

before doing any thing you need a domain in ArvanCloud CDN

In your code, use it like the below:

```php
...
// Using Cdn Service
CDN::domain('your_domain.com')->get();

// more Example
// 1
CDN::domain()->get('your_domain.com');
// 2 
CDN::domain()->all();
// 3
CDN::cache('your_domain.com')->purge();
// 4
CDN::dns()->delete('Dns_id','your_domain.com')
              ->getMessage();
```
Available methods:
- `domain` :
  - `all()` : get all domains
  - `create(string $domain)` : Create New Domain.
  - `get(string $domain = null)` : Get Domain Settings
  - `delete(string $domain = null)` : Delete Domain.
- `cache` :
  - `get(string $domain = null)` : Get Domain Cache settings.
  - `update(array $data, string $domain = null)` : Update Domain Cache settings.
  - `purge(array $urls = null, string $domain = null)` : Purge Domain Cache.
- `dns` :
  - `all()` : Get All Domain Dns.
  - `create(string $domain)` : Create new Domain Dns.
  - `get(string $domain = null)` : Get Domain Dns Settings.
  - `update(string $id, array $data, string $domain = null)` : Update Domain Dns Settings.
  - `delete(string $domain = null)` : Delete Domain Dns.
  - `cloud(string $id, bool $status = true, string $domain = null)` : Update Domain Dns Cloud Status.
- `ssl` :
  - `get(string $domain = null)` : Get Domain Ssl Settings.
  - `update(string $sslType, string $domain = null)` : Update Domain Ssl Settings.

## Credits

- [Mohammad Abbasi](https://github.com/mohammadv184)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
