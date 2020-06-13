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

namespace Module\Plans\Block;

use Pi;
use Module\Guide\Form\SearchLocationForm;

class Block
{
    public static function plans($options = [], $module = null)
    {
        // Set options
        $block = [];
        $block = array_merge($block, $options);

        // Check category
        if ($block['category'] == 0) {
            return false;
        }

        // Load language
        Pi::service('i18n')->load(['module/plans', 'default']);

        // Get list
        $block['resources'] = Pi::api('plans', 'plans')->getPlansLight($block['category']);

        return $block;
    }
}