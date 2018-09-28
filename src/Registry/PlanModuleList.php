<?php
/**
 * Pi Engine (http://piengine.org)
 *
 * @link            http://code.piengine.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://piengine.org
 * @license         http://piengine.org/license.txt BSD 3-Clause License
 */

/**
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */
namespace Module\Plans\Registry;

use Pi;
use Pi\Application\Registry\AbstractRegistry;

/**
 * Plan Module List
 */
class PlanModuleList extends AbstractRegistry
{
    /** @var string Module name */
    protected $module = 'plans';

    /**
     * {@inheritDoc}
     */
    protected function loadDynamic($options = array())
    {
        $return = array();
        $where = array('status' => 1, 'type' => 'module');
        $select = Pi::model('plans', $this->module)->select()->where($where);
        $rowset = Pi::model('plans', $this->module)->selectWith($select);
        foreach ($rowset as $row) {
            $return[$row->id] = Pi::api('plans', 'plans')->canonizePlan($row);
        }
        return $return;
    }

    /**
     * {@inheritDoc}
     * @param array
     */
    public function read()
    {
        $options = array();
        $result = $this->loadData($options);

        return $result;
    }

    /**
     * {@inheritDoc}
     * @param bool $name
     */
    public function create()
    {
        $this->clear('');
        $this->read();

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function setNamespace($meta = '')
    {
        return parent::setNamespace('');
    }

    /**
     * {@inheritDoc}
     */
    public function flush()
    {
        return $this->clear('');
    }
}
