<?php

namespace Backpack\Pan;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class PanAnalyticsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

    public function setup()
    {
        CRUD::setModel('Backpack\Pan\PanAnalytic');
        CRUD::setRoute(config('backpack.base.route_prefix').'/'.config('backpack.pan.route_prefix'));
        CRUD::setEntityNameStrings(null, trans('backpack-pan::pan.analytics'));
    }

    public function setupListOperation()
    {
        CRUD::column('name')->label(trans('backpack-pan::pan.name'));
        CRUD::column('impressions')->label(trans('backpack-pan::pan.impressions'));
        CRUD::column('clicks')->label(trans('backpack-pan::pan.clicks'));
        CRUD::column('hovers')->label(trans('backpack-pan::pan.hovers'));

        if (config('backpack.pan.filters.impressions')) {
            CRUD::addFilter(
                [
                    'type'  => 'text',
                    'name'  => 'impressions',
                    'label' => trans('backpack-pan::pan.impressions'),
                ],
                false,
                function ($value) {
                    $this->crud->addClause('where', 'impressions', '>=', (int) $value);
                }
            );
        }

        if (config('backpack.pan.filters.clicks')) {
            CRUD::addFilter(
                [
                    'type'  => 'text',
                    'name'  => 'clicks',
                    'label' => trans('backpack-pan::pan.clicks'),
                ],
                false,
                function ($value) {
                    $this->crud->addClause('where', 'clicks', '>=', (int) $value);
                }
            );
        }

        if (config('backpack.pan.filters.hovers')) {
            CRUD::addFilter(
                [
                    'type'  => 'text',
                    'name'  => 'hovers',
                    'label' => trans('backpack-pan::pan.hovers'),
                ],
                false,
                function ($value) {
                    $this->crud->addClause('where', 'hovers', '>=', (int) $value);
                }
            );
        }
    }
}
