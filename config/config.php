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
    'category' => [
        [
            'title' => _a('Admin'),
            'name'  => 'admin',
        ],
        [
            'title' => _a('View'),
            'name'  => 'view',
        ],
        [
            'title' => _a('Order'),
            'name'  => 'order',
        ],
    ],
    'item'     => [
        // Admin
        'admin_perpage'          => [
            'category'    => 'admin',
            'title'       => _a('Perpage'),
            'description' => '',
            'edit'        => 'text',
            'filter'      => 'number_int',
            'value'       => 10,
        ],
        // View
        'view_type'              => [
            'title'    => _a('Plans view type'),
            'edit'     => [
                'type'    => 'select',
                'options' => [
                    'options' => [
                        'list' => _a('List'),
                        'tab'  => _a('Tab'),
                    ],
                ],
            ],
            'filter'   => 'text',
            'value'    => 'list',
            'category' => 'view',
        ],
        'category_active'        => [
            'category'    => 'view',
            'title'       => _a('Active category url'),
            'description' => '',
            'edit'        => 'checkbox',
            'filter'      => 'number_int',
            'value'       => 0,
        ],
        'view_price_type'        => [
            'title'    => _a('Action for price 0'),
            'edit'     => [
                'type'    => 'select',
                'options' => [
                    'options' => [
                        'free'     => _a('Free'),
                        'contact'  => _a('Contact'),
                        'adaptive' => _a('Adaptive'),
                        'hide'     => _a('Hide'),
                    ],
                ],
            ],
            'filter'   => 'text',
            'value'    => 'free',
            'category' => 'view',
        ],
        // Order
        'order_active'           => [
            'category'    => 'order',
            'title'       => _a('Order is active ?'),
            'description' => '',
            'edit'        => 'checkbox',
            'filter'      => 'number_int',
            'value'       => 1,
        ],
        // Texts
        'index_text_title'       => [
            'category'    => 'head_meta',
            'title'       => _a('Title for homepage'),
            'description' => '',
            'edit'        => 'text',
            'filter'      => 'string',
            'value'       => _a('List of our website plans'),
        ],
        'index_text_description' => [
            'category'    => 'head_meta',
            'title'       => _a('Description for homepage'),
            'description' => '',
            'edit'        => 'textarea',
            'filter'      => 'string',
            'value'       => '',
        ],
    ],
];
