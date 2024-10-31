[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

# pan-panel

A package to easily view the [panphp/pan](https://github.com/panphp/pan) analytics in your Backpack admin panel. What is PAN?

> Pan is a lightweight and privacy-focused PHP product analytics library. It’s designed as a very simple package that you can install via `composer require` and start tracking your pages or components with a simple `data-pan` attribute.

<img width="1673" alt="backpack_pan_panel" src="https://github.com/user-attachments/assets/572d2b02-c069-4e41-b1f6-5b903d5b2ebd">


## Installation

Install the package via composer:

```bash
composer require backpack/pan-panel
```

Optionally, you can publish this package config file to change the default values:

```bash
php artisan vendor:publish --tag="pan-config"
```

If you didn't have `panphp/pan` in your project prior to installing this package, you should run the install command for the `panphp/pan` package:

```bash
php artisan pan:install
```

**NOTE**: Check the [panphp/pan](https://github.com/panphp/pan) documentation for more information on how to configure the package, most of the configurations can be done in the `config/backpack/pan.php` if you published this package config file.

### Optional

You can add an item to the menu in `resources/views/vendor/backpack/ui/inc/menu_items.blade.php`:

```html
<x-backpack::menu-item title="Analytics" icon="la la-dashboard" :link="backpack_url(config('backpack.pan.route_prefix'))" />
```

#### Filters

Backpack provide some out-of-the-box filters. To use them you should have `backpack/pro` installed. If you don't have it installed, enabling them in the config file does not have any effect. 

## Credits

Credits go to Nuno Maduro (the creator of PAN) and [Pedro Martins](https://github.com/pxpm), the Backpack core developer who created this package.

## License

This project was released under MIT License, so you can install it on top of any Backpack & Laravel project. Please see the license file for more information.

[ico-version]: https://img.shields.io/packagist/v/backpack/pan-panel.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/backpack/pan-panel.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/backpack/pan-panel
[link-downloads]: https://packagist.org/packages/backpack/pan-panel
