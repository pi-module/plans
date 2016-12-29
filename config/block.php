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
    'plans' => array(
        'title' => _a('Select category plan'),
        'description' => _a('Shwo selected category plan on block'),
        'render' => array('block', 'plans'),
        'template' => 'plans',
        'config' => array(
            'category' => array(
                'title' => _a('Category'),
                'description' => '',
                'edit' => 'Module\Plans\Form\Element\Category',
                'filter' => 'string',
                'value' => 0,
            ),
        ),
    ),
);