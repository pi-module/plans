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
 * Pi::api('plans', 'plans')->getPlan($parameter, $type = 'id');
 * Pi::api('plans', 'plans')->getPlansLight($category);
 * Pi::api('plans', 'plans')->getPlans();
 * Pi::api('plans', 'plans')->canonizePlan($plan);
 */

class Plans extends AbstractApi
{
    public function getPlan($parameter, $type = 'id')
    {
        $plan = Pi::model('plans', $this->getModule())->find($parameter, $type);
        $plan = $this->canonizePlan($plan);
        return $plan;
    }

    public function getPlansLight($category = 0)
    {
        // Get plans
        $plans = array();
        $order = array('order ASC, id ASC');
        $where = array('status' => 1);
        if ($category > 0) {
            $where['category'] = $category;
        }
        $select = Pi::model('plans', $this->getModule())->select()->where($where)->order($order);
        $rowset = Pi::model('plans', $this->getModule())->selectWith($select);
        foreach ($rowset as $row) {
            $plans[$row->id] = $this->canonizePlan($row);
        }
        return $plans;
    }

    public function getPlans()
    {
        // Get plans
        $plans = array();
        $order = array('order ASC, id ASC');
        $where = array('status' => 1);
        $select = Pi::model('plans', $this->getModule())->select()->where($where)->order($order);
        $rowset = Pi::model('plans', $this->getModule())->selectWith($select);
        foreach ($rowset as $row) {
            $plans[$row->id] = $this->canonizePlan($row);
        }
        // Get category
        $category = array(
            0 => array(
                'id' => 0,
                'title' => '',
                'plans' => array(),
            ),
        );
        $where = array('status' => 1);
        $select = Pi::model('category', $this->getModule())->select()->where($where);
        $rowset = Pi::model('category', $this->getModule())->selectWith($select);
        foreach ($rowset as $row) {
            $category[$row->id] = $row->toArray();
            $category[$row->id]['plans'] = array();
            $category[$row->id]['active'] = 0;
        }
        // Add plans to category
        foreach ($plans as $plan) {
            $category[$plan['category']]['plans'][$plan['id']] = $plan;
        }

        $categories = array();
        foreach ($category as $singleCategory) {
            if (!empty($singleCategory['plans'])) {
                $categories[$singleCategory['id']] = $singleCategory;
            }
        }

        $activeID = min(array_keys($categories));
        $categories[$activeID]['active'] = 1;

        return $categories;
    }

    public function canonizePlan($plan)
    {
        // Check
        if (empty($plan)) {
            return '';
        }
        $plan = $plan->toArray();
        // Get config
        $config = Pi::service('registry')->config->read($this->getModule());
        // Set description
        $setting = Json::decode($plan['setting'], true);
        $plan = array_merge($plan, $setting['description'], $setting['action'], $setting['design']);
        // Set price
        if ($plan['price'] > 0) {
            $plan['price_view'] = Pi::api('api', 'plans')->viewPrice($plan['price']);
        } else {
            switch ($config['view_price_type']) {
                case 'free':
                    $plan['price_view'] = __('Free');
                    break;

                case 'contact':
                    $plan['price_view'] = __('Contact');
                    break;

                case 'adaptive':
                    $plan['price_view'] = __('Adaptive');
                    break;

                case 'hide':
                    $plan['price_view'] = '';
                    break;
            }
        }
        // Set vat
        $plan['vat_view'] = Pi::api('api', 'plans')->viewPrice($plan['vat']);
        // Set order url
        $plan['orderUrl'] = Pi::url(Pi::service('url')->assemble('plans', array(
            'module' => $this->getModule(),
            'controller' => 'order',
            'action' => 'add',
            'id' => $plan['id'],
        )));
        // Set product Url
        $plan['productUrl'] = Pi::url(Pi::service('url')->assemble('plans', array(
            'module' => $this->getModule(),
            'controller' => 'index',
            'action' => 'index',
        )));
        // Set product Url
        $plan['thumbUrl'] = '';
        // Set time_period_view
        $plan['time_period_view'] = '';
        switch ($plan['time_period']) {
            case 0:
                $plan['time_period_view'] = __('Unlimited');
                break;

            case 15:
                $plan['time_period_view'] = __('15 days');
                break;

            case 30:
                $plan['time_period_view'] = __('1 month');
                break;

            case 60:
                $plan['time_period_view'] = __('2 months');
                break;

            case 90:
                $plan['time_period_view'] = __('3 months');
                break;

            case 120:
                $plan['time_period_view'] = __('4 months');
                break;

            case 150:
                $plan['time_period_view'] = __('5 months');
                break;

            case 180:
                $plan['time_period_view'] = __('6 months');
                break;

            case 365:
                $plan['time_period_view'] = __('12 months');
                break;
        }
        // Set type view
        switch ($plan['type']) {
            case 'manual':
                $plan['type_view'] = __('Manual');
                break;

            case 'role':
                $plan['type_view'] = __('Role');
                break;

            case 'credit':
                $plan['type_view'] = __('Credit');
                break;

            case 'module':
                $plan['type_view'] = __('Module');
                break;
        }
        // Set order title
        $plan['order_title'] = empty($plan['order_title']) ? __('Order') : $plan['order_title'];
        // return item
        return $plan;
    }
}