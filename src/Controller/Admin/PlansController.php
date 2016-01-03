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

namespace Module\Plans\Controller\Admin;

use Pi;
use Pi\Mvc\Controller\ActionController;
use Module\Plans\Form\PlansForm;
use Module\Plans\Form\PlansFilter;

class PlansController extends ActionController
{
    public function indexAction()
    {
        // Get info
        $list = array();
        $order = array('id DESC');
        $select = $this->getModel('plans')->select()->order($order);
        $rowset = $this->getModel('plans')->selectWith($select);
        // Make list
        foreach ($rowset as $row) {
            $list[$row->id] = $row->toArray();
        }
        // Set view
        $this->view()->setTemplate('plans-index');
        $this->view()->assign('list', $list);
    }

    public function updateAction()
    {

    }
}