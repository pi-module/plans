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

namespace Module\Plans\Form;

use Pi;
use Laminas\InputFilter\InputFilter;

class PlansFilter extends InputFilter
{
    public function __construct($option)
    {
        // title
        $this->add(
            [
                'name'     => 'title',
                'required' => true,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // category
        $this->add(
            [
                'name'     => 'category',
                'required' => false,
            ]
        );

        // type
        $this->add(
            [
                'name'     => 'type',
                'required' => true,
            ]
        );

        // module
        $this->add(
            [
                'name'       => 'module',
                'required'   => false,
                'validators' => [
                    new \Module\Plans\Validator\Type,
                ],
            ]
        );

        // status
        $this->add(
            [
                'name'     => 'status',
                'required' => true,
            ]
        );

        // status
        $this->add(
            [
                'name'     => 'status',
                'required' => true,
            ]
        );

        // order
        $this->add(
            [
                'name'     => 'order',
                'required' => false,
            ]
        );

        // price
        $this->add(
            [
                'name'     => 'price',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // vat
        $this->add(
            [
                'name'     => 'vat',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // time_period
        $this->add(
            [
                'name'     => 'time_period',
                'required' => true,
            ]
        );

        // description_1
        $this->add(
            [
                'name'     => 'description_1',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_2
        $this->add(
            [
                'name'     => 'description_2',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_3
        $this->add(
            [
                'name'     => 'description_3',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_4
        $this->add(
            [
                'name'     => 'description_4',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_5
        $this->add(
            [
                'name'     => 'description_5',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_6
        $this->add(
            [
                'name'     => 'description_6',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_7
        $this->add(
            [
                'name'     => 'description_7',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_8
        $this->add(
            [
                'name'     => 'description_8',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_9
        $this->add(
            [
                'name'     => 'description_9',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );
        // description_10
        $this->add(
            [
                'name'     => 'description_10',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_11
        $this->add(
            [
                'name'     => 'description_11',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_12
        $this->add(
            [
                'name'     => 'description_12',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_13
        $this->add(
            [
                'name'     => 'description_13',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_14
        $this->add(
            [
                'name'     => 'description_14',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // description_15
        $this->add(
            [
                'name'     => 'description_15',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // order_title
        $this->add(
            [
                'name'     => 'order_title',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // order_url
        $this->add(
            [
                'name'     => 'order_url',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // link_title
        $this->add(
            [
                'name'     => 'link_title',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // link_url
        $this->add(
            [
                'name'     => 'link_url',
                'required' => false,
                'filters'  => [
                    [
                        'name' => 'StringTrim',
                    ],
                ],
            ]
        );

        // icon
        $this->add(
            [
                'name'     => 'icon',
                'required' => false,
            ]
        );

        // color
        $this->add(
            [
                'name'     => 'color',
                'required' => false,
            ]
        );
    }
}
