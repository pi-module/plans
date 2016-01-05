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
namespace Module\Plans\Api;

use Pi;
use Pi\Application\Api\AbstractApi;
use Zend\Db\Sql\Predicate\Expression;
use Zend\Json\Json;

/*
 * Pi::api('order', 'plans')->getProductDetails($product);
 * Pi::api('order', 'plans')->postPaymentUpdate($order, $basket);
 * Pi::api('order', 'plans')->getOrder($id);
 * Pi::api('order', 'plans')->canonizeOrder($order);
 */

class Order extends AbstractApi
{
    public function getProductDetails($product)
    {
        return Pi::api('plans', 'plans')->getPlan($product);
    }

    public function postPaymentUpdate($order, $basket)
    {
        // Update time
        if ($order['module_item'] > 0) {
            // Get plan
            $plan = Pi::api('plans', 'plans')->getPlan($order['module_item']);
            $setting = Json::decode($plan['setting'], true);
            // Save order
            $values = array(
                'uid' => $order['uid'],
                'plan' => $plan['id'],
                'order_id' => $order['id'],
                'price' => $order['product_price'],
                'vat'=> $order['vat_price'],
                'total'=> $order['total_price'],
                'time_order' => time(),
                'time_start' => time(),
                'time_end' => time() + ($plan['time_period'] * 86400),
                'status' => 1,
                'extra' => Json::encode($setting['action']),
            );
            $row = Pi::model('order', $this->getModule())->createRow();
            $row->assign($values);
            $row->save();
            // Update by type
            switch ($plan['type']) {
                case 'manual':
                    // Set url
                    $url = Pi::url(Pi::service('url')->assemble('plans', array(
                        'module' => $this->getModule(),
                        'controller' => 'order',
                        'action' => 'finish',
                        'id' => $row->id,
                    )));
                    break;

                case 'role':
                    // Update role
                    Pi::service('user')->setRole($order['uid'], $plan['role']);
                    // Set url
                    $url = Pi::url(Pi::service('url')->assemble('plans', array(
                        'module' => $this->getModule(),
                        'controller' => 'order',
                        'action' => 'finish',
                        'id' => $row->id,
                    )));
                    break;

                case 'module':
                    // Set url
                    $url = Pi::url(Pi::service('url')->assemble('plans', array(
                        'module' => $this->getModule(),
                        'controller' => 'order',
                        'action' => 'finish',
                        'id' => $row->id,
                    )));
                    break;
            }
            // Send notification
            //Pi::api('notification', 'plans')->newPlan($order, $plan);
            // Set back url
            return $url;
        }
    }

    public function getOrder($id)
    {
        $order = Pi::model('order', $this->getModule())->find($id);
        $order = $this->canonizeOrder($order);
        return $order;
    }

    public function canonizeOrder($order)
    {
        // Check
        if (empty($order)) {
            return '';
        }
        $order = $order->toArray();

        return $order;
    }
}