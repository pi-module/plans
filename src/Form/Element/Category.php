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
namespace Module\Plans\Form\Element;

use Pi;
use Zend\Form\Element\Select;

class Category extends Select
{
    /**
     * @return array
     */
    public function getValueOptions()
    {
        if (empty($this->valueOptions)) {
            $this->valueOptions = array(0 => '');
            $where = array('status' => 1);
            $order = array('title ASC', 'id DESC');
            $select = Pi::model('category', $this->options['module'])->select()->where($where)->order($order);
            $rowset = Pi::model('category', $this->options['module'])->selectWith($select);
            foreach ($rowset as $row) {
                $this->valueOptions[$row->id] = $row->title;
            }
        }
        return $this->valueOptions;
    }
}