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

namespace Module\Plans\Controller\Front;

use Pi;
use Pi\Mvc\Controller\ActionController;
use Zend\Json\Json;

class OrderController extends ActionController
{
    public function addAction()
    {
        // Check user is login or not
        Pi::service('authentication')->requireLogin();
        // Check order is active or inactive
        if (!$this->config('order_active')) {
            $this->getResponse()->setStatusCode(401);
            $this->terminate(__('So sorry, At this moment order is inactive'), '', 'error-denied');
            $this->view()->setLayout('layout-simple');
            return;
        }
        // Set template
        $this->view()->setTemplate(false);
        // check order module
        if (Pi::service('module')->isActive('order')) {
            // Get info from url
            $module = $this->params('module');
            $id = $this->params('id');
            // Check id
            if (!$id) {
                $this->getResponse()->setStatusCode(401);
                $this->terminate(__('You need select plan'), '', 'error-denied');
                $this->view()->setLayout('layout-simple');
                return;
            }
            // Get plan
            $plan = Pi::api('plans', 'plans')->getPlan($id);
            // Check plan
            if (!$plan || $plan['status'] != 1) {
                $this->getResponse()->setStatusCode(401);
                $this->terminate(__('You need select plan'), '', 'error-denied');
                $this->view()->setLayout('layout-simple');
                return;
            }
            // Set singel Product
            $singleProduct = array(
                'product' => $plan['id'],
                'product_price' => $plan['price'],
                'discount_price' => 0,
                'shipping_price' => 0,
                'setup_price' => 0,
                'packing_price' => 0,
                'vat_price' => $plan['vat'],
                'number' => 1,
                'title' => $plan['title'],
            );
            // Set order array
            $order = array();
            $order['module_name'] = $module;
            $order['module_item'] = $plan['id'];
            $order['type_payment'] = 'recurring';
            $order['type_commodity'] = 'service';
            $order['product'][$plan['id']] = $singleProduct;
            // Set and go to order
            $url = Pi::api('order', 'order')->setOrderInfo($order);
            Pi::service('url')->redirect($url);
        } else {
            $this->getResponse()->setStatusCode(401);
            $this->terminate(__('Order module not installed'), '', 'error-denied');
            $this->view()->setLayout('layout-simple');
            return;
        }
    }

    public function finishAction() {
        // Check user is login or not
        Pi::service('authentication')->requireLogin();
        // Check order is active or inactive
        if (!$this->config('order_active')) {
            $this->getResponse()->setStatusCode(401);
            $this->terminate(__('So sorry, At this moment order is inactive'), '', 'error-denied');
            $this->view()->setLayout('layout-simple');
            return;
        }
        // Get info from url
        $id = $this->params('id');
        $module = $this->params('module');
        // Get order and plan
        $orderPlan = Pi::api('order', 'plans')->getOrder($id);
        $plan = Pi::api('plans', 'plans')->getPlan($orderPlan['plan']);
        $orderOrder = Pi::api('order', 'order')->getOrder($orderPlan['order_id']);
        // Check order
        if (!$orderOrder['id']) {
            $url = array('', 'module' => $module, 'controller' => 'index', 'action' => 'index');
            $this->jump($url, __('Order not set.'));
        }
        // Check user
        if ($orderOrder['uid'] != Pi::user()->getId()) {
            $url = array('', 'module' => $module, 'controller' => 'index', 'action' => 'index');
            $this->jump($url, __('It not your order.'));
        }
        // Check status payment
        if ($orderOrder['status_payment'] != 2) {
            $url = array('', 'module' => $module, 'controller' => 'index', 'action' => 'index');
            $this->jump($url, __('This order not pay'));
        }
        // Check time payment
        $time = time() - 3600;
        if ($time > $orderOrder['time_payment']) {
            $url = array('', 'module' => $module, 'controller' => 'index', 'action' => 'index');
            $this->jump($url, __('This is old order and you pay it before'));
        }
        // Set links
        $orderOrder['order_link'] = Pi::url($this->url('order', array(
            'module' => 'order',
            'controller' => 'detail',
            'action' => 'index',
            'id' => $orderOrder['id']
        )));
        $orderOrder['user_link'] = Pi::url($this->url('order', array(
            'module' => 'order',
            'controller' => 'index',
            'action' => 'index',
        )));
        $orderOrder['index_link'] = Pi::url($this->url('', array(
            'module' => $module,
            'controller' => 'index',
            'action' => 'index',
        )));
        // Get invoice information
        Pi::service('i18n')->load(array('module/order', 'default'));
        $invoices = Pi::api('invoice', 'order')->getInvoiceFromOrder($orderOrder['id']);
        // Set view
        $this->view()->setTemplate('order-finish');
        $this->view()->assign('orderOrder', $orderOrder);
        $this->view()->assign('orderPlan', $orderPlan);
        $this->view()->assign('invoices', $invoices);
        $this->view()->assign('plan', $plan);
    }
}