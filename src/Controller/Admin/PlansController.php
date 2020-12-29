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

namespace Module\Plans\Controller\Admin;

use Pi;
use Pi\Mvc\Controller\ActionController;
use Module\Plans\Form\PlansForm;
use Module\Plans\Form\PlansFilter;
use Laminas\Json\Json;

class PlansController extends ActionController
{
    public function indexAction()
    {
        // Get info
        $list   = [];
        $order  = ['id DESC'];
        $select = $this->getModel('plans')->select()->order($order);
        $rowset = $this->getModel('plans')->selectWith($select);

        // Make list
        foreach ($rowset as $row) {
            $list[$row->id] = Pi::api('plans', 'plans')->canonizePlan($row);
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
        $option          = [];
        $option['isNew'] = ($id > 0) ? 0 : 1;

        // Set form
        $form = new PlansForm('plans', $option);
        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            $form->setInputFilter(new PlansFilter($option));
            $form->setData($data);
            if ($form->isValid()) {
                $values = $form->getData();

                // Get roles
                $roleList = [];
                $roles    = Pi::service('registry')->role->read('front');
                unset($roles['member']);
                unset($roles['webmaster']);
                unset($roles['guest']);
                if (count($roles) > 0) {
                    foreach ($roles as $key => $role) {
                        $roleList[] = $key;
                    }
                }

                // Set type
                if ($values['type'] == 'manual') {
                    $action         = [
                        'action' => 'manual',
                    ];
                    $values['type'] = 'manual';
                } elseif ($values['type'] == 'module') {
                    $action         = [
                        'action' => 'module',
                    ];
                    $values['type'] = 'module';
                } elseif ($values['type'] == 'credit') {
                    $action         = [
                        'action' => 'automatic',
                        'type'   => 'credit',
                    ];
                    $values['type'] = 'credit';
                } elseif (!empty($roleList) && in_array($values['type'], $roleList)) {
                    $action         = [
                        'action' => 'automatic',
                        'type'   => 'role',
                        'role'   => $values['type'],
                    ];
                    $values['type'] = 'role';
                } else {
                    $action         = [
                        'action' => 'manual',
                    ];
                    $values['type'] = 'manual';
                }

                // Set setting
                $setting                = [];
                $setting['action']      = $action;
                $setting['description'] = [
                    'description_1'  => $values['description_1'],
                    'description_2'  => $values['description_2'],
                    'description_3'  => $values['description_3'],
                    'description_4'  => $values['description_4'],
                    'description_5'  => $values['description_5'],
                    'description_6'  => $values['description_6'],
                    'description_7'  => $values['description_7'],
                    'description_8'  => $values['description_8'],
                    'description_9'  => $values['description_9'],
                    'description_10' => $values['description_10'],
                    'description_11' => $values['description_11'],
                    'description_12' => $values['description_12'],
                    'description_13' => $values['description_13'],
                    'description_14' => $values['description_14'],
                    'description_15' => $values['description_15'],
                    'order_title'    => $values['order_title'],
                    'order_url'      => $values['order_url'],
                    'link_title'     => $values['link_title'],
                    'link_url'       => $values['link_url'],
                ];
                $setting['design']      = [
                    'icon'  => $values['icon'],
                    'color' => $values['color'],
                ];
                $values['setting']      = Json::encode($setting);

                // Set time
                if (empty($id)) {
                    $values['time_create'] = time();
                }
                $values['time_update'] = time();

                // Save values
                if (!empty($id)) {
                    $row = $this->getModel('plans')->find($id);
                } else {
                    $row = $this->getModel('plans')->createRow();
                }
                $row->assign($values);
                $row->save();

                // clean registry
                Pi::registry('planModuleList', 'plans')->clear();

                // Check it save or not
                $message = __('Plan data saved successfully.');
                $this->jump(['action' => 'index'], $message);
            }
        } else {
            if ($id) {
                // Get plan info
                $values = $this->getModel('plans')->find($id)->toArray();

                // Set description
                $setting = Json::decode($values['setting'], true);
                $values  = array_merge($values, $setting['description'], $setting['design']);

                // Set type
                switch ($values['type']) {
                    case 'manual':
                        $values['type'] = 'manual';
                        break;

                    case 'role':
                        $values['type'] = $setting['action']['role'];
                        break;
                }

                // Set on form
                $form->setData($values);
            }
        }

        // Set view
        $this->view()->setTemplate('plans-update');
        $this->view()->assign('form', $form);
        $this->view()->assign('title', __('Add plan'));
    }
}
