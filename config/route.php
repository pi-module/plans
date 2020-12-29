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
    // route name
    'guide' => [
        'name'    => 'plans',
        'type'    => 'Module\Plans\Route\Plans',
        'options' => [
            'route'    => '/plans',
            'defaults' => [
                'module'     => 'plans',
                'controller' => 'index',
                'action'     => 'index',
            ],
        ],
    ],
];
