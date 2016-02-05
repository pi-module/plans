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
        // Get info from url
        $module = $this->params('module');
        $categorySingle = $this->params('category');
        // Get config
        $config = Pi::service('registry')->config->read($module);
        // Get list of plans and category
        $categories = Pi::api('plans', 'plans')->getPlans();
        //
        if (isset($categorySingle) && !empty($categorySingle) && $categorySingle > 0) {
            $categoryList = array();
            foreach ($categories as $category) {
                if ($category['id'] == $categorySingle) {
                    $categoryList[$category['id']] = $category;
                }
            }
            $categories = $categoryList;
        }
        // Set view
        $this->view()->setTemplate('index-index');
        $this->view()->assign('categories', $categories);
        $this->view()->assign('categorySingle', $categorySingle);
        $this->view()->assign('config', $config);
    }
}