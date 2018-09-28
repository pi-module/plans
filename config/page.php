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
    // Admin section
    'admin' => array(
        array(
            'title' => _a('Plans'),
            'controller' => 'plans',
            'permission' => 'plans',
        ),
        array(
            'title' => _a('Category'),
            'controller' => 'category',
            'permission' => 'category',
        ),
        array(
            'title' => _a('Order'),
            'controller' => 'order',
            'permission' => 'order',
        ),
    ),
    // Front section
    'front' => array(
        array(
            'title' => _a('Index page'),
            'controller' => 'index',
            'block' => 1,
        ),
    ),
);