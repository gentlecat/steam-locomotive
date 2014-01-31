# Steam Locomotive [![Build Status](https://api.travis-ci.org/tsukanov/steam-locomotive.png)](https://travis-ci.org/tsukanov/steam-locomotive) [![Latest Stable Version](https://poser.pugx.org/tsukanov/steam-locomotive/v/stable.png)](https://packagist.org/packages/tsukanov/steam-locomotive) [![Latest Unstable Version](https://poser.pugx.org/tsukanov/steam-locomotive/v/unstable.png)](https://packagist.org/packages/tsukanov/steam-locomotive)

Steam Locomotive is a PHP wrapper for Steam Web API with useful tools such as Steam ID converters, validators, etc.

Please, feel free to contribute! You can add missing interface, fix function
that is not working properly or do something else. Any improvements are welcome.

## How it works

This library wraps interfaces provided by Steam Web API into PHP classes and functions.
It simplifies communication with Steam while preserving original structure of its API.
Each interface, method, and parameter has the same name so you can easily start using this
library if you worked with Steam Web API before.

Also, this library provides some useful tools that are not available in official API,
but might be needed. You can get additional details about applications, store, prices;
convert Steam ID or validate one.

### Returned data format
In most cases functions return JSON that is decoded using [`json_decode`](http://php.net/json_decode) function.
*See PHPDoc comments to find out more about data returned by each function.*

## Usage example

    use Tsukanov\SteamLocomotive\Locomotive;
    $steam = new Locomotive(YOUR_STEAM_API_KEY);
	
	// Getting information about heroes in Dota 2
    $response = $steam->IEconDOTA2_570->GetHeroes();

## Installation

### [Composer](http://getcomposer.org/)
Composer is a tool for dependency management in PHP. Steam Locomotive is available as a
[package](https://packagist.org/packages/tsukanov/steam-locomotive) for Composer.
All you need to do is define the following requirement in your composer.json file: 

    {
        "require": {
            "tsukanov/steam-locomotive": "v0.1.0"
        }
    }

## License

    Copyright 2014 Roman Tsukanov

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
