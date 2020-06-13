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
    'plans' => [
        'title'       => _a('Select category plan'),
        'description' => _a('Shwo selected category plan on block'),
        'render'      => ['block', 'plans'],
        'template'    => 'plans',
        'config'      => [
            'category' => [
                'title'       => _a('Category'),
                'description' => '',
                'edit'        => 'Module\Plans\Form\Element\Category',
                'filter'      => 'string',
                'value'       => 0,
            ],
        ],
    ],
];