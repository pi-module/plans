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

namespace Module\Plans\Model;

use Pi\Application\Model\Model;

class Order extends Model
{
    /**
     * {@inheritDoc}
     */
    protected $columns
        = [
            'id',
            'uid',
            'plan',
            'order_id',
            'price',
            'vat',
            'total',
            'time_order',
            'time_start',
            'time_end',
            'status',
            'extra',
        ];
}
