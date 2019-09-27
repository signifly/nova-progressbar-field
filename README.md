# Nova ProgressBar Field
[![Latest Version on Packagist](https://img.shields.io/packagist/v/signifly/nova-progressbar-field.svg?style=flat-square)](https://packagist.org/packages/signifly/nova-progressbar-field)
[![Total Downloads](https://img.shields.io/packagist/dt/signifly/nova-progressbar-field.svg?style=flat-square)](https://packagist.org/packages/signifly/nova-progressbar-field)
[![License](https://poser.pugx.org/signifly/nova-progressbar-field/license)](https://packagist.org/packages/signifly/nova-progressbar-field)

This package allows you to add progressbar fields to your resources and dashboards in [Nova](https://nova.laravel.com).

It basically takes a field with a decimal value between 0 and 1 and shows it as a percentage progress bar.

It edits like a text field.

<img src="https://github.com/signifly/nova-progressbar-field/blob/master/img/screenshot-index.png" alt="index example">
<img src="https://github.com/signifly/nova-progressbar-field/blob/master/img/screenshot-detail.png" alt="detail example">
<img src="https://github.com/signifly/nova-progressbar-field/blob/master/img/screenshot-form.png" alt="form example">

#### DISCLAIMER: 
This package is still work in progress. Feel free to help improve it.


* [Requirements](#requirements)
* [Installation](#installation)
* [Basic Usage](#basic-usage)
* [Advanced Options](#advanced-options)

___
## Requirements
* [Laravel v5.8.*](https://laravel.com/docs/5.8)
* [Laravel Nova v2.*](https://nova.laravel.com/docs/2.0/)

___
## Installation
Just run:  
```bash
composer require Signifly/nova-progressbar-card
```
After this the setup will be complete and you can use the components listed here.



___
## Basic Usage
```php
// in App\Nova\User
...
use signifly\Nova\Fields\ProgressBar\ProgressBar;
...

/**
 * Get the fields available for the request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return array
 */
public function fields(Request $request)
{
    return [
        ProgressBar::make('Awesomeness'),
    ];
}

```

___ 
## Advanced Options

### Custom color
```php
public function cards(Request $request)
{
    return [
        ProgressBar::make('Awesomeness')
            ->options([
                'color' => '#FFEA82',
            ]),
    ];
}
```

### Animate Bar Color A -> B
```php
public function cards(Request $request)
{
    return [
        ProgressBar::make('Awesomeness')
            ->options([
                'fromColor' => '#FFEA82',
                'toColor' => '#40BF55',
                'animateColor' => true,
            ]),
    ];
}
```

Feel free to come with suggestions for improvements.
