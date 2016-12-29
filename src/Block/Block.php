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
namespace Module\Plans\Block;

use Pi;
use Module\Guide\Form\SearchLocationForm;

class Block
{
    public static function plans($options = array(), $module = null)
    {
        // Set options
        $block = array();
        $block = array_merge($block, $options);
        // Check category
        if ($block['category'] == 0) {
            return false;
        }
        // Get list
        $block['resources'] = Pi::api('plans', 'plans')->getPlansLight($block['category']);


        return $block;
    }
}