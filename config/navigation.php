<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
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