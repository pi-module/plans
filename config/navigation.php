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
return array(
    'admin' => array(
        'plans' => array(
            'label' => _a('Plans'),
            'permission' => array(
                'resource' => 'plans',
            ),
            'route' => 'admin',
            'module' => 'plans',
            'controller' => 'plans',
            'action' => 'index',
        ),
        'category' => array(
            'label' => _a('Category'),
            'permission' => array(
                'resource' => 'category',
            ),
            'route' => 'admin',
            'module' => 'plans',
            'controller' => 'category',
            'action' => 'index',
        ),
        'order' => array(
            'label' => _a('Order'),
            'permission' => array(
                'resource' => 'order',
            ),
            'route' => 'admin',
            'module' => 'plans',
            'controller' => 'order',
            'action' => 'index',
        ),
    ),
);