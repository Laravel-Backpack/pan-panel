# pan-panel
A panel to view the [panphp/pan](https://github.com/panphp/pan) analytics in your panel.

## Installation

Install the package via composer:

```bash
composer require backpack/pan-panel
```

If you don't have `panphp/pan` installed you should first install it with: 

```bash
php artisan pan:install
```

**NOTE**: Check the [panphp/pan](https://github.com/panphp/pan) documentation for more information on how to configure the package.

### Optional

You can add an item to the menu in `resources/views/vendor/backpack/ui/inc/menu_items.blade.php`:

```html
<x-backpack::menu-item title="Analytics" icon="la la-dashboard" :link="backpack_url(config('backpack.pan.route_prefix'))" />

