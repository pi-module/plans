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

class IndexController extends ActionController
{
    public function indexAction()
    {
        $plans = Pi::api('plans', 'plans')->getPlans();

        // Set view
        $this->view()->setTemplate('index-index');
        $this->view()->assign('plans', $plans);
    }
}