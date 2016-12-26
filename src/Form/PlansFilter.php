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
namespace Module\Plans\Form;

use Pi;
use Zend\InputFilter\InputFilter;

class PlansFilter extends InputFilter
{
    public function __construct($option)
    {
        // id
        $this->add(array(
            'name' => 'id',
            'required' => false,
        ));
        // title
        $this->add(array(
            'name' => 'title',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // type
        $this->add(array(
            'name' => 'type',
            'required' => true,
        ));
        // module
        $this->add(array(
            'name' => 'module',
            'required' => false,
            'validators' => array(
                new \Module\Plans\Validator\Type,
            ),
        ));
        // status
        $this->add(array(
            'name' => 'status',
            'required' => true,
        ));
        // status
        $this->add(array(
            'name' => 'status',
            'required' => true,
        ));
        // order
        $this->add(array(
            'name' => 'order',
            'required' => false,
        ));
        // price
        $this->add(array(
            'name' => 'price',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // vat
        $this->add(array(
            'name' => 'vat',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // time_period
        $this->add(array(
            'name' => 'time_period',
            'required' => true,
        ));
        // description_1
        $this->add(array(
            'name' => 'description_1',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // description_2
        $this->add(array(
            'name' => 'description_2',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // description_3
        $this->add(array(
            'name' => 'description_3',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // description_4
        $this->add(array(
            'name' => 'description_4',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // description_5
        $this->add(array(
            'name' => 'description_5',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // description_6
        $this->add(array(
            'name' => 'description_6',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // description_7
        $this->add(array(
            'name' => 'description_7',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // description_8
        $this->add(array(
            'name' => 'description_8',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // description_9
        $this->add(array(
            'name' => 'description_9',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // description_10
        $this->add(array(
            'name' => 'description_10',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // order_title
        $this->add(array(
            'name' => 'order_title',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // link_title
        $this->add(array(
            'name' => 'link_title',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // link_url
        $this->add(array(
            'name' => 'link_url',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // icon
        $this->add(array(
            'name' => 'icon',
            'required' => false,
        ));
        // color
        $this->add(array(
            'name' => 'color',
            'required' => false,
        ));
    }
}