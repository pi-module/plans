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
use Pi\Form\Form as BaseForm;

class PlansForm extends BaseForm
{
    public function __construct($name = null, $option = [])
    {
        $this->option           = $option;
        $this->option['module'] = Pi::service('module')->current();
        parent::__construct($name);
    }

    public function getInputFilter()
    {
        if (!$this->filter) {
            $this->filter = new PlansFilter($this->option);
        }
        return $this->filter;
    }

    public function init()
    {
        // title
        $this->add(
            [
                'name'       => 'title',
                'options'    => [
                    'label' => __('Title'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                    'required'    => true,
                ],
            ]
        );

        // category
        $this->add(
            [
                'name'    => 'category',
                'type'    => 'Module\Plans\Form\Element\Category',
                'options' => [
                    'label'    => __('Category'),
                    'category' => '',
                    'module'   => $this->option['module'],
                ],
            ]
        );

        // type
        $this->add(
            [
                'name'       => 'type',
                'type'       => 'Module\Plans\Form\Element\Type',
                'options'    => [
                    'label'    => __('Type'),
                    'category' => '',
                    'module'   => $this->option['module'],
                ],
                'attributes' => [
                    'description' => '',
                    'required'    => true,
                ],
            ]
        );

        // module
        $this->add(
            [
                'name'       => 'module',
                'type'       => 'select',
                'options'    => [
                    'label'         => __('Module'),
                    'value_options' => [
                        ''      => '',
                        'video' => __('Video'),
                        'guide' => __('guide'),
                    ],
                ],
                'attributes' => [
                    'description' => __('Use it when you select module type'),
                ],
            ]
        );

        // status
        $this->add(
            [
                'name'       => 'status',
                'type'       => 'select',
                'options'    => [
                    'label'         => __('Status'),
                    'value_options' => [
                        1 => __('Published'),
                        2 => __('Pending review'),
                        3 => __('Draft'),
                        4 => __('Private'),
                    ],
                ],
                'attributes' => [
                    'required' => true,
                ],
            ]
        );

        // order
        $this->add(
            [
                'name'       => 'order',
                'options'    => [
                    'label' => __('Order view'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',

                ],
            ]
        );

        // extra price
        $this->add(
            [
                'name'    => 'extra_price',
                'type'    => 'fieldset',
                'options' => [
                    'label' => __('Price options'),
                ],
            ]
        );

        // price
        $this->add(
            [
                'name'       => 'price',
                'options'    => [
                    'label' => __('Price'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                    'required'    => true,
                ],
            ]
        );

        // vat
        $this->add(
            [
                'name'       => 'vat',
                'options'    => [
                    'label' => __('Vat'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => __('Please put vat as true price or leave it empty for set 0'),
                ],
            ]
        );

        // time_period
        if ($this->option['isNew']) {
            $this->add(
                [
                    'name'       => 'time_period',
                    'type'       => 'select',
                    'options'    => [
                        'label'         => __('Period'),
                        'value_options' => [
                            0   => __('Unlimited'),
                            15  => __('15 days'),
                            30  => __('1 month'),
                            60  => __('2 months'),
                            90  => __('3 months'),
                            120 => __('4 months'),
                            150 => __('5 months'),
                            180 => __('6 months'),
                            365 => __('12 months'),
                            999 => __('Unlimited (Hide time)'),
                        ],
                    ],
                    'attributes' => [
                        'value'    => 365,
                        'required' => true,
                    ],
                ]
            );
        } else {
            $this->add(
                [
                    'name'       => 'time_period',
                    'attributes' => [
                        'type' => 'hidden',
                    ],
                ]
            );
        }

        // extra description
        $this->add(
            [
                'name'    => 'extra_description',
                'type'    => 'fieldset',
                'options' => [
                    'label' => __('Description options'),
                ],
            ]
        );

        // description_1
        $this->add(
            [
                'name'       => 'description_1',
                'options'    => [
                    'label' => __('Description 1'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_2
        $this->add(
            [
                'name'       => 'description_2',
                'options'    => [
                    'label' => __('Description 2'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_3
        $this->add(
            [
                'name'       => 'description_3',
                'options'    => [
                    'label' => __('Description 3'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_4
        $this->add(
            [
                'name'       => 'description_4',
                'options'    => [
                    'label' => __('Description 4'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_5
        $this->add(
            [
                'name'       => 'description_5',
                'options'    => [
                    'label' => __('Description 5'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_6
        $this->add(
            [
                'name'       => 'description_6',
                'options'    => [
                    'label' => __('Description 6'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_7
        $this->add(
            [
                'name'       => 'description_7',
                'options'    => [
                    'label' => __('Description 7'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_8
        $this->add(
            [
                'name'       => 'description_8',
                'options'    => [
                    'label' => __('Description 8'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_9
        $this->add(
            [
                'name'       => 'description_9',
                'options'    => [
                    'label' => __('Description 9'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_10
        $this->add(
            [
                'name'       => 'description_10',
                'options'    => [
                    'label' => __('Description 10'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_11
        $this->add(
            [
                'name'       => 'description_11',
                'options'    => [
                    'label' => __('Description 11'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_12
        $this->add(
            [
                'name'       => 'description_12',
                'options'    => [
                    'label' => __('Description 12'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_13
        $this->add(
            [
                'name'       => 'description_13',
                'options'    => [
                    'label' => __('Description 13'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_14
        $this->add(
            [
                'name'       => 'description_14',
                'options'    => [
                    'label' => __('Description 14'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // description_15
        $this->add(
            [
                'name'       => 'description_15',
                'options'    => [
                    'label' => __('Description 15'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // extra order
        $this->add(
            [
                'name'    => 'extra_order',
                'type'    => 'fieldset',
                'options' => [
                    'label' => __('Extra order'),
                ],
            ]
        );

        // order_title
        $this->add(
            [
                'name'       => 'order_title',
                'options'    => [
                    'label' => __('Order button title'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // order_url
        $this->add(
            [
                'name'       => 'order_url',
                'options'    => [
                    'label' => __('Order url'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => __('If set it, when click on order button, this link will be open'),
                ],
            ]
        );

        // extra link
        $this->add(
            [
                'name'    => 'extra_link',
                'type'    => 'fieldset',
                'options' => [
                    'label' => __('Extra link'),
                ],
            ]
        );

        // link_title
        $this->add(
            [
                'name'       => 'link_title',
                'options'    => [
                    'label' => __('Link title'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // link_url
        $this->add(
            [
                'name'       => 'link_url',
                'options'    => [
                    'label' => __('Link url'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => '',
                ],
            ]
        );

        // extra design
        $this->add(
            [
                'name'    => 'extra_design',
                'type'    => 'fieldset',
                'options' => [
                    'label' => __('Design options'),
                ],
            ]
        );

        // icon
        $this->add(
            [
                'name'       => 'icon',
                'options'    => [
                    'label' => __('Icon'),
                ],
                'attributes' => [
                    'type'        => 'text',
                    'description' => __('Use fontawesome.io icons, and set icon name like fa-home'),
                ],
            ]
        );

        // color
        $this->add(
            [
                'name'       => 'color',
                'type'       => 'select',
                'options'    => [
                    'label'         => __('Color'),
                    'value_options' => [
                        'p-red'         => __('Red'),
                        'p-pink'        => __('Pink'),
                        'p-purple'      => __('Purple'),
                        'p-deep-purple' => __('Deep Purple'),
                        'p-indigo'      => __('Indigo'),
                        'p-blue'        => __('Blue'),
                        'p-light-blue'  => __('Light Blue'),
                        'p-cyan'        => __('Cyan'),
                        'p-teal'        => __('Teal'),
                        'p-green'       => __('Green'),
                        'p-light-green' => __('Light Green'),
                        'p-lime'        => __('Lime'),
                        'p-yellow'      => __('Yellow'),
                        'p-amber'       => __('Amber'),
                        'p-orange'      => __('Orange'),
                        'p-deep-orange' => __('Deep Orange'),
                        'p-brown'       => __('Brown'),
                        'p-grey'        => __('Grey'),
                        'p-blue-grey'   => __('Blue Grey'),
                        'p-black'       => __('Black'),
                    ],
                ],
                'attributes' => [
                    'description' => __('Use google design standard'),
                ],
            ]
        );

        // Save
        $this->add(
            [
                'name'       => 'submit',
                'type'       => 'submit',
                'attributes' => [
                    'value' => __('Submit'),
                ],
            ]
        );
    }
}
