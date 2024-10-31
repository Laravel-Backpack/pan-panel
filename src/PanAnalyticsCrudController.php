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
        CRUD::setRoute(config('backpack.base.route_prefix').'/'.config('backpack.pan.panel_route_prefix'));
        CRUD::setEntityNameStrings(null, trans('backpack-pan::pan.analytics'));
    }

    public function setupListOperation()
    {
        CRUD::column('name')->label(trans('backpack-pan::pan.name'));
        CRUD::column('impressions')->label(trans('backpack-pan::pan.impressions'));
        CRUD::column('clicks')->label(trans('backpack-pan::pan.clicks'));
        CRUD::column('hovers')->label(trans('backpack-pan::pan.hovers'));

        if (backpack_pro()) {
            $this->setupFilters();
        }
    }

    private function setupFilters(): void
    {
        if (config('backpack.pan.filters.tags')) {
            CRUD::addFilter(
                [
                    'type'    => 'select2_multiple',
                    'name'    => 'tags',
                    'label'   => trans('backpack-pan::pan.tags'),
                ],
                PanAnalytic::all()->pluck('name', 'id')->toArray(),
                function ($values) {
                    CRUD::addClause('whereIn', 'id', json_decode($values, false, 512, JSON_NUMERIC_CHECK));
                }
            );
        }

        if (config('backpack.pan.filters.impressions')) {
            CRUD::addFilter(
                [
                    'type'  => 'range',
                    'name'  => 'impressions',
                    'label' => trans('backpack-pan::pan.impressions'),
                ],
                false,
                function ($value) {
                    $range = json_decode($value);
                    if(empty($range->to)) {
                        return $this->crud->addClause('where', 'impressions', '>=', (int) $range->from);
                    }
                    $this->crud->addClause('where', 'impressions', '>=', (int) $range->from);
                    $this->crud->addClause('where', 'impressions', '<=', (int) $range->to);
                }
            );
        }

        if (config('backpack.pan.filters.clicks')) {
            CRUD::addFilter(
                [
                    'type'  => 'range',
                    'name'  => 'clicks',
                    'label' => trans('backpack-pan::pan.clicks'),
                ],
                false,
                function ($value) {
                    $range = json_decode($value);
                    if(empty($range->to)) {
                        return $this->crud->addClause('where', 'clicks', '>=', (int) $range->from);
                    }
                    $this->crud->addClause('where', 'clicks', '>=', (int) $range->from);
                    $this->crud->addClause('where', 'clicks', '<=', (int) $range->to);
                }
            );
        }

        if (config('backpack.pan.filters.hovers')) {
            CRUD::addFilter(
                [
                    'type'  => 'range',
                    'name'  => 'hovers',
                    'label' => trans('backpack-pan::pan.hovers'),
                ],
                false,
                function ($value) {
                    $range = json_decode($value);
                    if(empty($range->to)) {
                        return $this->crud->addClause('where', 'hovers', '>=', (int) $range->from);
                    }
                    $this->crud->addClause('where', 'hovers', '>=', (int) $range->from);
                    $this->crud->addClause('where', 'hovers', '<=', (int) $range->to);
                }
            );
        }
    }
}
