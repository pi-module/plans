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
    // route name
    'guide' => array(
        'name' => 'plans',
        'type' => 'Module\Plans\Route\Plans',
        'options' => array(
            'route' => '/plans',
            'defaults' => array(
                'module' => 'plans',
                'controller' => 'index',
                'action' => 'index'
            )
        ),
    )
);