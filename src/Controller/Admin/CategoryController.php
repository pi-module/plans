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
use Module\Plans\Form\CategoryForm;
use Module\Plans\Form\CategoryFilter;

class CategoryController extends ActionController
{
    public function indexAction()
    {
        // Get info from url
        $module = $this->params('module');

        // Get config
        $config = Pi::service('registry')->config->read($module);

        // Get info
        $list   = [];
        $order  = ['id DESC'];
        $select = $this->getModel('category')->select()->order($order);
        $rowset = $this->getModel('category')->selectWith($select);

        // Make list
        foreach ($rowset as $row) {
            $list[$row->id] = $row->toArray();
        }

        // Set view
        $this->view()->setTemplate('category-index');
        $this->view()->assign('list', $list);
        $this->view()->assign('config', $config);
    }

    public function updateAction()
    {
        // Get id
        $id = $this->params('id');

        // Set form
        $form = new CategoryForm('category');
        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            $form->setInputFilter(new CategoryFilter);
            $form->setData($data);
            if ($form->isValid()) {
                $values = $form->getData();

                // Save values
                if (!empty($values['id'])) {
                    $row = $this->getModel('category')->find($values['id']);
                } else {
                    $row = $this->getModel('category')->createRow();
                }
                $row->assign($values);
                $row->save();

                // Check it save or not
                $message = __('Category data saved successfully.');
                $this->jump(['action' => 'index'], $message);
            }
        } else {
            if ($id) {
                $values = $this->getModel('category')->find($id)->toArray();
                $form->setData($values);
            }
        }

        // Set view
        $this->view()->setTemplate('category-update');
        $this->view()->assign('form', $form);
        $this->view()->assign('title', __('Add category'));
    }
}