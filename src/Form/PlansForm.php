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
    public function __construct($name = null, $option = array())
    {
        $this->option = $option;
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
        // id
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        // title
        $this->add(array(
            'name' => 'title',
            'options' => array(
                'label' => __('Title'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
                'required' => true,
            )
        ));
        // category
        $this->add(array(
            'name' => 'category',
            'type' => 'Module\Plans\Form\Element\Category',
            'options' => array(
                'label' => __('Category'),
                'category' => '',
                'module' => $this->option['module'],
            ),
        ));
        // type
        $this->add(array(
            'name' => 'type',
            'type' => 'Module\Plans\Form\Element\Type',
            'options' => array(
                'label' => __('Type'),
                'category' => '',
                'module' => $this->option['module'],
            ),
            'attributes' => array(
                'description' => '',
                'required' => true,
            )
        ));
        // module
        $this->add(array(
            'name' => 'module',
            'type' => 'select',
            'options' => array(
                'label' => __('Module'),
                'value_options' => array(
                    '' => '',
                    'video' => __('Video'),
                    'guide' => __('guide'),
                ),
            ),
            'attributes' => array(
                'description' => __('Use it when you select module type'),
            )
        ));
        // status
        $this->add(array(
            'name' => 'status',
            'type' => 'select',
            'options' => array(
                'label' => __('Status'),
                'value_options' => array(
                    1 => __('Published'),
                    2 => __('Pending review'),
                    3 => __('Draft'),
                    4 => __('Private'),
                ),
            ),
            'attributes' => array(
                'required' => true,
            )
        ));
        // order
        $this->add(array(
            'name' => 'order',
            'options' => array(
                'label' => __('Order view'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',

            )
        ));
        // extra price
        $this->add(array(
            'name' => 'extra_price',
            'type' => 'fieldset',
            'options' => array(
                'label' => __('Price options'),
            ),
        ));
        // price
        $this->add(array(
            'name' => 'price',
            'options' => array(
                'label' => __('Price'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
                'required' => true,
            )
        ));
        // vat
        $this->add(array(
            'name' => 'vat',
            'options' => array(
                'label' => __('Vat'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => __('Please put vat as true price or leave it empty for set 0'),
            )
        ));
        // time_period
        if ($this->option['isNew']) {
            $this->add(array(
                'name' => 'time_period',
                'type' => 'select',
                'options' => array(
                    'label' => __('Period'),
                    'value_options' => array(
                        0 => __('Unlimited'),
                        15 => __('15 days'),
                        30 => __('1 month'),
                        60 => __('2 months'),
                        90 => __('3 months'),
                        120 => __('4 months'),
                        150 => __('5 months'),
                        180 => __('6 months'),
                        365 => __('12 months'),
                        999 => __('Unlimited (Hide time)'),
                    ),
                ),
                'attributes' => array(
                    'value' => 365,
                    'required' => true,
                )
            ));
        } else {
            $this->add(array(
                'name' => 'time_period',
                'attributes' => array(
                    'type' => 'hidden',
                ),
            ));
        }
        // extra description
        $this->add(array(
            'name' => 'extra_description',
            'type' => 'fieldset',
            'options' => array(
                'label' => __('Description options'),
            ),
        ));
        // description_1
        $this->add(array(
            'name' => 'description_1',
            'options' => array(
                'label' => __('Description 1'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_2
        $this->add(array(
            'name' => 'description_2',
            'options' => array(
                'label' => __('Description 2'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_3
        $this->add(array(
            'name' => 'description_3',
            'options' => array(
                'label' => __('Description 3'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_4
        $this->add(array(
            'name' => 'description_4',
            'options' => array(
                'label' => __('Description 4'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_5
        $this->add(array(
            'name' => 'description_5',
            'options' => array(
                'label' => __('Description 5'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_6
        $this->add(array(
            'name' => 'description_6',
            'options' => array(
                'label' => __('Description 6'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_7
        $this->add(array(
            'name' => 'description_7',
            'options' => array(
                'label' => __('Description 7'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_8
        $this->add(array(
            'name' => 'description_8',
            'options' => array(
                'label' => __('Description 8'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_9
        $this->add(array(
            'name' => 'description_9',
            'options' => array(
                'label' => __('Description 9'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_10
        $this->add(array(
            'name' => 'description_10',
            'options' => array(
                'label' => __('Description 10'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_11
        $this->add(array(
            'name' => 'description_11',
            'options' => array(
                'label' => __('Description 11'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_12
        $this->add(array(
            'name' => 'description_12',
            'options' => array(
                'label' => __('Description 12'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_13
        $this->add(array(
            'name' => 'description_13',
            'options' => array(
                'label' => __('Description 13'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_14
        $this->add(array(
            'name' => 'description_14',
            'options' => array(
                'label' => __('Description 14'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // description_15
        $this->add(array(
            'name' => 'description_15',
            'options' => array(
                'label' => __('Description 15'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // extra order
        $this->add(array(
            'name' => 'extra_order',
            'type' => 'fieldset',
            'options' => array(
                'label' => __('Extra order'),
            ),
        ));
        // order_title
        $this->add(array(
            'name' => 'order_title',
            'options' => array(
                'label' => __('Order button title'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // order_url
        $this->add(array(
            'name' => 'order_url',
            'options' => array(
                'label' => __('Order url'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => __('If set it, when click on order button, this link will be open'),
            )
        ));
        // extra link
        $this->add(array(
            'name' => 'extra_link',
            'type' => 'fieldset',
            'options' => array(
                'label' => __('Extra link'),
            ),
        ));
        // link_title
        $this->add(array(
            'name' => 'link_title',
            'options' => array(
                'label' => __('Link title'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // link_url
        $this->add(array(
            'name' => 'link_url',
            'options' => array(
                'label' => __('Link url'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
            )
        ));
        // extra design
        $this->add(array(
            'name' => 'extra_design',
            'type' => 'fieldset',
            'options' => array(
                'label' => __('Design options'),
            ),
        ));
        // icon
        $this->add(array(
            'name' => 'icon',
            'options' => array(
                'label' => __('Icon'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => __('Use fontawesome.io icons, and set icon name like fa-home'),
            )
        ));
        // color
        $this->add(array(
            'name' => 'color',
            'type' => 'select',
            'options' => array(
                'label' => __('Color'),
                'value_options' => array(
                    'p-red' => __('Red'),
                    'p-pink' => __('Pink'),
                    'p-purple' => __('Purple'),
                    'p-deep-purple' => __('Deep Purple'),
                    'p-indigo' => __('Indigo'),
                    'p-blue' => __('Blue'),
                    'p-light-blue' => __('Light Blue'),
                    'p-cyan' => __('Cyan'),
                    'p-teal' => __('Teal'),
                    'p-green' => __('Green'),
                    'p-light-green' => __('Light Green'),
                    'p-lime' => __('Lime'),
                    'p-yellow' => __('Yellow'),
                    'p-amber' => __('Amber'),
                    'p-orange' => __('Orange'),
                    'p-deep-orange' => __('Deep Orange'),
                    'p-brown' => __('Brown'),
                    'p-grey' => __('Grey'),
                    'p-blue-grey' => __('Blue Grey'),
                    'p-black' => __('Black'),
                ),
            ),
            'attributes' => array(
                'description' => __('Use google design standard'),
            )
        ));
        // Save
        $this->add(array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'value' => __('Submit'),
            )
        ));
    }
}