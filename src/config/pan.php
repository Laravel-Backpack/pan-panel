<?php

return [
    // the prefix you use to submit events to the API
    'events_route_prefix' => 'pan',

    // the prefix you use to access your analytics panel
    'panel_route_prefix' => 'analytics',

    // to use filters in your panel you need to have backpack/pro installed. https://backpackforlaravel.com/products/pro-for-unlimited-projects
    'filters'      => [
        'tags'        => true,
        'impressions' => true,
        'clicks'      => true,
        'hovers'      => true,
    ],

    // the controller used to display the analytics panel
    'controller'   => \Backpack\Pan\PanAnalyticsCrudController::class,
];
