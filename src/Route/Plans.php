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

namespace Module\Plans\Route;

use Pi\Mvc\Router\Http\Standard;

class Plans extends Standard
{
    /**
     * Default values.
     * @var array
     */
    protected $defaults = array(
        'module' => 'plans',
        'controller' => 'index',
        'action' => 'index'
    );

    protected $controllerList = array(
        'index', 'order'
    );

    /**
     * {@inheritDoc}
     */
    protected $structureDelimiter = '/';

    /**
     * {@inheritDoc}
     */
    protected function parse($path)
    {
        $matches = array();
        $parts = array_filter(explode($this->structureDelimiter, $path));

        // Set controller
        $matches = array_merge($this->defaults, $matches);
        if (isset($parts[0]) && in_array($parts[0], $this->controllerList)) {
            $matches['controller'] = $this->decode($parts[0]);
        }

        // Make Match
        if (isset($matches['controller'])) {
            switch ($matches['controller']) {
                case 'index':
                    if (isset($parts[0]) && $parts[0] == 'category') {
                        $matches['category'] = intval($parts[1]);
                    }
                    break;

                case 'order':
                    if (isset($parts[1]) && $parts[1] == 'add') {
                        $matches['action'] = 'add';
                        if (isset($parts[2]) && is_numeric($parts[2])) {
                            $matches['id'] = intval($parts[2]);
                        }
                    } elseif (isset($parts[1]) && $parts[1] == 'finish') {
                        $matches['action'] = 'finish';
                        if (isset($parts[2]) && is_numeric($parts[2])) {
                            $matches['id'] = intval($parts[2]);
                        }
                    }
                    break;
            }
        }

        /* echo '<pre>';
        print_r($parts);
        print_r($matches);
        echo '</pre>'; */

        return $matches;
    }

    /**
     * assemble(): Defined by Route interface.
     *
     * @see    Route::assemble()
     * @param  array $params
     * @param  array $options
     * @return string
     */
    public function assemble(
        array $params = array(),
        array $options = array()
    )
    {
        $mergedParams = array_merge($this->defaults, $params);
        if (!$mergedParams) {
            return $this->prefix;
        }

        // Set module
        if (!empty($mergedParams['module'])) {
            $url['module'] = $mergedParams['module'];
        }

        // Set controller
        if (!empty($mergedParams['controller'])
            && $mergedParams['controller'] != 'index'
            && in_array($mergedParams['controller'], $this->controllerList)
        ) {
            $url['controller'] = $mergedParams['controller'];
        }

        // Set action
        if (!empty($mergedParams['action'])
            && $mergedParams['action'] != 'index'
        ) {
            $url['action'] = $mergedParams['action'];
        }

        // Set id
        if (isset($mergedParams['id'])) {
            $url['id'] = $mergedParams['id'];
        }

        // Set category
        if (isset($mergedParams['category'])) {
            $url['category'] = 'category' . $this->paramDelimiter .$mergedParams['category'];
        }

        // Make url
        $url = implode($this->paramDelimiter, $url);

        if (empty($url)) {
            return $this->prefix;
        }
        return $this->paramDelimiter . $url;
    }
}