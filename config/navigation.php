<?php
/**
 * Pi Engine (http://piengine.org)
 *
 * @link            http://code.piengine.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://piengine.org
 * @license         http://piengine.org/license.txt New BSD License
 */

/**
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */
return [
    'admin' => [
        'plans'    => [
            'label'      => _a('Plans'),
            'permission' => [
                'resource' => 'plans',
            ],
            'route'      => 'admin',
            'module'     => 'plans',
            'controller' => 'plans',
            'action'     => 'index',
            'pages'      => [
                'list'    => [
                    'label'      => _a('Plans'),
                    'permission' => [
                        'resource' => 'plans',
                    ],
                    'route'      => 'admin',
                    'module'     => 'plans',
                    'controller' => 'plans',
                    'action'     => 'index',
                ],
                'manage'     => [
                    'label'      => _a('New plan / update'),
                    'permission' => [
                        'resource' => 'plans',
                    ],
                    'route'      => 'admin',
                    'module'     => 'plans',
                    'controller' => 'plans',
                    'action'     => 'update',
                ],
            ],
        ],
        'category' => [
            'label'      => _a('Category'),
            'permission' => [
                'resource' => 'category',
            ],
            'route'      => 'admin',
            'module'     => 'plans',
            'controller' => 'category',
            'action'     => 'index',
            'pages'      => [
                'list'    => [
                    'label'      => _a('Category'),
                    'permission' => [
                        'resource' => 'category',
                    ],
                    'route'      => 'admin',
                    'module'     => 'plans',
                    'controller' => 'category',
                    'action'     => 'index',
                ],
                'manage'     => [
                    'label'      => _a('New category / update'),
                    'permission' => [
                        'resource' => 'category',
                    ],
                    'route'      => 'admin',
                    'module'     => 'plans',
                    'controller' => 'category',
                    'action'     => 'update',
                ],
            ],
        ],
        'order'    => [
            'label'      => _a('Order'),
            'permission' => [
                'resource' => 'order',
            ],
            'route'      => 'admin',
            'module'     => 'plans',
            'controller' => 'order',
            'action'     => 'index',
        ],
    ],
];