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
            // Set manual action
            $this->valueOptions['manual'] = __('Manual');
            // Set role action
            $roles = Pi::service('registry')->role->read('front');
            unset($roles['member']);
            unset($roles['webmaster']);
            unset($roles['guest']);
            if (count($roles) > 0) {
                foreach ($roles as $key => $role) {
                    $this->valueOptions[$key] = sprintf(__('Add role : %s'), $role['title']);
                }
            }
            // Set credit action
            /* ToDo */
            /* Use new credit system */
            if (Pi::service('module')->isActive('user')) {
                $field = Pi::registry('field', 'user')->read();
                $field = array_keys($field);
                if (in_array('credit', $field)) {
                    $this->valueOptions['credit'] = __('Update user credit');
                }
            }
            // Set module action
            /* ToDo */
        }
        return $this->valueOptions;
    }
}