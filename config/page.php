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
    // Admin section
    'admin' => [
        [
            'title'      => _a('Plans'),
            'controller' => 'plans',
            'permission' => 'plans',
        ],
        [
            'title'      => _a('Category'),
            'controller' => 'category',
            'permission' => 'category',
        ],
        [
            'title'      => _a('Order'),
            'controller' => 'order',
            'permission' => 'order',
        ],
    ],
    // Front section
    'front' => [
        [
            'title'      => _a('Index page'),
            'controller' => 'index',
            'block'      => 1,
        ],
    ],
];