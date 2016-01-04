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

    public function getPlans()
    {
        $plans = array();
        $order = array('order ASC, id ASC');
        $where = array('status' => 1);
        $select = Pi::model('plans', $this->getModule())->select()->where($where)->order($order);
        $rowset = Pi::model('plans', $this->getModule())->selectWith($select);
        foreach ($rowset as $row) {
            $plans[$row->id] = $this->canonizePlan($row);
        }
        return $plans;
    }

    public function canonizePlan($plan)
    {
        // Check
        if (empty($plan)) {
            return '';
        }
        $plan = $plan->toArray();
        // Set description
        $setting = Json::decode($plan['setting'], true);
        $plan = array_merge($plan, $setting['description']);
        // Set price
        $plan['price_view'] = Pi::api('api', 'plans')->viewPrice($plan['price']);
        // Set vat
        $plan['vat_view'] = Pi::api('api', 'plans')->viewPrice($plan['vat']);
        // Set order url
        $plan['orderUrl'] = Pi::url(Pi::service('url')->assemble('plans', array(
            'module' => $this->getModule(),
            'controller' => 'order',
            'action' => 'add',
            'id' => $plan['id'],
        )));
        // return item
        return $plan;
    }
}