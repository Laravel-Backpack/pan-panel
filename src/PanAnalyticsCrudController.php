<?php

namespace Backpack\Pan;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class PanAnalyticsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

    public function setup()
    {
        $this->crud->setModel('Backpack\Pan\Models\PanAnalytics');
        $this->crud->setRoute(config('backpack.base.route_prefix').'/'.config('backpack.pan.route_prefix'));
        $this->crud->setEntityNameStrings('pan analytics', 'pan analytics');
    }

    public function setupListOperation()
    {
    }
}
