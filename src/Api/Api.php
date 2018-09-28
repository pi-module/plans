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

namespace Module\Plans\Api;

use Pi;
use Pi\Application\Api\AbstractApi;

/*
 * Pi::api('api', 'plans')->viewPrice($price);
 */

class Api extends AbstractApi
{
    public function viewPrice($price)
    {
        if (Pi::service('module')->isActive('order')) {
            // Load language
            Pi::service('i18n')->load(array('module/order', 'default'));
            // Set price
            $viewPrice = Pi::api('api', 'order')->viewPrice($price);
        } else {
            $viewPrice = _currency($price);
        }
        return $viewPrice;
    }
}