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
use Zend\Json\Json;

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
        // Get id
        $id = $this->params('id', 0);
        // Set option
        $option = array();
        $option['isNew'] = ($id > 0) ? 0 : 1;
        // Set form
        $form = new PlansForm('plans', $option);
        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            $form->setInputFilter(new PlansFilter($option));
            $form->setData($data);
            if ($form->isValid()) {
                $values = $form->getData();
                // Set setting
                $setting = array(
                    'description_1' => $values['description_1'],
                    'description_2' => $values['description_2'],
                    'description_3' => $values['description_3'],
                    'description_4' => $values['description_4'],
                    'description_5' => $values['description_5'],
                    'description_6' => $values['description_6'],
                    'description_7' => $values['description_7'],
                    'description_8' => $values['description_8'],
                    'description_9' => $values['description_9'],
                    'description_10' => $values['description_10'],
                );
                $values['setting'] = Json::encode($setting);
                // Set time
                if (empty($values['id'])) {
                    $values['time_create'] = time();
                }
                $values['time_update'] = time();
                // Save values
                if (!empty($values['id'])) {
                    $row = $this->getModel('plans')->find($values['id']);
                } else {
                    $row = $this->getModel('plans')->createRow();
                }
                $row->assign($values);
                $row->save();
                // Check it save or not
                $message = __('Plan data saved successfully.');
                $this->jump(array('action' => 'index'), $message);
            }
        } else {
            if ($id) {
                $values = $this->getModel('plans')->find($id)->toArray();
                $setting = Json::decode($values['setting'], true);
                $values = array_merge($values, $setting);
                $form->setData($values);
            }
        }
        // Set view
        $this->view()->setTemplate('plans-update');
        $this->view()->assign('form', $form);
        $this->view()->assign('title', __('Add plan'));
    }
}