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

class Plans extends Model
{
    /**
     * {@inheritDoc}
     */
    protected $columns
        = [
            'id',
            'category',
            'title',
            'status',
            'time_create',
            'time_update',
            'time_period',
            'price',
            'vat',
            'type',
            'module',
            'order',
            'setting',
        ];
}