# pan-panel
A package to view the [panphp/pan](https://github.com/panphp/pan) analytics in your panel.

![image](https://github.com/user-attachments/assets/0d4cbd18-f120-44be-8910-520698980af6)


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

