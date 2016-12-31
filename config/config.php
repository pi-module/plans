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
    'category' => array(
        array(
            'title' => _a('Admin'),
            'name' => 'admin'
        ),
        array(
            'title' => _a('View'),
            'name' => 'view'
        ),
        array(
            'title' => _a('Order'),
            'name' => 'order'
        ),
    ),
    'item' => array(
        // Admin
        'admin_perpage' => array(
            'category' => 'admin',
            'title' => _a('Perpage'),
            'description' => '',
            'edit' => 'text',
            'filter' => 'number_int',
            'value' => 10
        ),
        // View
        'view_type' => array(
            'title' => _a('Plans view type'),
            'edit' => array(
                'type' => 'select',
                'options' => array(
                    'options' => array(
                        'list' => _a('List'),
                        'tab' => _a('Tab'),
                    ),
                ),
            ),
            'filter' => 'text',
            'value' => 'list',
            'category' => 'view',
        ),
        'category_active' => array(
            'category' => 'view',
            'title' => _a('Active category url'),
            'description' => '',
            'edit' => 'checkbox',
            'filter' => 'number_int',
            'value' => 0
        ),
        'view_price_type' => array(
            'title' => _a('Action for price 0'),
            'edit' => array(
                'type' => 'select',
                'options' => array(
                    'options' => array(
                        'free' => _a('Free'),
                        'contact' => _a('Contact'),
                        'adaptive' => _a('Adaptive'),
                        'hide' => _a('Hide'),
                    ),
                ),
            ),
            'filter' => 'text',
            'value' => 'free',
            'category' => 'view',
        ),
        // Order
        'order_active' => array(
            'category' => 'order',
            'title' => _a('Order is active ?'),
            'description' => '',
            'edit' => 'checkbox',
            'filter' => 'number_int',
            'value' => 1
        ),
        // Texts
        'index_text_title' => array(
            'category' => 'head_meta',
            'title' => _a('Title for homepage'),
            'description' => '',
            'edit' => 'text',
            'filter' => 'string',
            'value' => _a('List of our website plans'),
        ),
        'index_text_description' => array(
            'category' => 'head_meta',
            'title' => _a('Description for homepage'),
            'description' => '',
            'edit' => 'textarea',
            'filter' => 'string',
            'value' => ''
        ),
    ),
);