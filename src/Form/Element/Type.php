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
namespace Module\Plans\Form\Element;

use Pi;
use Zend\Form\Element\Select;

class Type extends Select
{
    /**
     * @return array
     */
    public function getValueOptions()
    {
        if (empty($this->valueOptions)) {
            $this->valueOptions = array('manual' => __('Manual'));

            $roles = Pi::service('registry')->role->read('front');
            unset($roles['member']);
            unset($roles['webmaster']);
            unset($roles['guest']);
            if (count($roles) > 0) {
                foreach ($roles as $key => $role) {
                    $this->valueOptions[$key] = sprintf(__('Add role : %s'), $role['title']);
                }
            }
        }
        return $this->valueOptions;
    }
}