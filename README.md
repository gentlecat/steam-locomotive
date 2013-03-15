# Steam Locomotive

Steam Locomotive is a PHP wrapper for Steam Web API with useful tools such as Steam ID converters, validators, etc.

## Installation

### [Composer](http://getcomposer.org/)
Composer is a tool for dependency management in PHP. Steam Locomotive is available as a [package](https://packagist.org/packages/tsukanov/steam-locomotive) for Composer. All you need to do is define the following requirement in your composer.json file: 

    {
        "require": {
            "tsukanov/steam-locomotive": "dev-master"
        }
    }

## Configuration
1. Get your Steam API key from https://steamcommunity.com/dev/apikey
2. Set STEAM_API_KEY constant in *config-sample.php*
3. Change name of *config-sample.php* to *config.php*

## Usage
    $loco_lib = new Locomotive();
   
## Requirements
* PHP 5
* [cURL](http://php.net/manual/en/book.curl.php)

## License

    Copyright 2013 Roman Tsukanov

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.