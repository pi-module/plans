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
return array(
    // Module meta
    'meta' => array(
        'title' => _a('Plans'),
        'description' => _a('Manage website plans'),
        'version' => '0.0.3',
        'license' => 'New BSD',
        'logo' => 'image/logo.png',
        'readme' => 'docs/readme.txt',
        'demo' => 'http://pialog',
        'icon' => 'fa-bookmark',
    ),
    // Author information
    'author' => array(
        'Name' => 'Hossein Azizabadi',
        'email' => 'azizabadi@faragostaresh.com',
        'website' => 'http://pialog',
        'credits' => 'Pi Engine Team'
    ),
    // Resource
    'resource' => array(
        'database' => 'database.php',
        'config' => 'config.php',
        'permission' => 'permission.php',
        'page' => 'page.php',
        'navigation' => 'navigation.php',
        'route' => 'route.php',
    ),
);