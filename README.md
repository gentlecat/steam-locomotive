# Steam Locomotive

Steam Locomotive is a PHP wrapper for Steam Web API with useful tools such as Steam ID converters, validators, etc.

## Configuration
1. Get your Steam API key from https://steamcommunity.com/dev/apikey
2. Set STEAM_API_KEY constant in *config-sample.php*
3. Change name of *config-sample.php* to *config.php*

## [Composer](http://getcomposer.org/)
    {
        "require": {
            "tsukanov/steam-locomotive": "dev-master"
        }
    }

## Usage
    $loco_lib = new Locomotive();
   
## Requirements
* PHP 5
* [cURL](http://php.net/manual/en/book.curl.php)