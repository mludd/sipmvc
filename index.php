<?php

/**
 * Dispatcher for sipMVC MVC Framework.
 *
 * @author Mikael Jacobson <mikael@mludd.se>
 * @license http://s.mludd.se/COPYING GNU General Public License
 */

/*
 * This file is part of The Simple PHP MVC Framework (sipMVC).
 *
 * Copyright (C) 2012-2014 Mikael Jacobson <mikael@mludd.se>
 *
 * sipMVC is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * sipMVC is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with sipMVC.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once dirname(__FILE__).'/functions.php';

$config = Models_ResourceManager::get('config');

setlocale(LC_ALL, $config->locale);
$cf = new Models_ControllerFactory();

// Smarty setup
define('SMARTY_DIR', $config->smartyDir);
//require_once(SMARTY_DIR.'Smarty.class.php');
include SMARTY_DIR.'Smarty.class.php';
$smarty = new Smarty();
$smarty->setTemplateDir('smarty/templates/');
$smarty->setCompileDir('smarty/templates_c/');
$smarty->setConfigDir('smarty/configs/');
$smarty->setCacheDir('smarty/cache/');

// Filter input
$route = $config->defaultRoute;
$action = 'index';
if (isset($_GET['controller'])) {
    $route = preg_replace('/[^a-z0-9]/', '', strtolower($_GET['controller']));
}
if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = preg_replace('/[^a-zA-Z0-9]/', '', $_GET['action']);
}

$args = array();
if (!empty($_GET['args']) && isset($_GET['args'])) {
    preg_match_all('/([^\/]+)\/([^\/]+)/', $_GET['args'], $arr);
    $args = array_combine($arr[1], $arr[2]);
}

$controller = Models_ControllerFactory::get($route, $action, $args, $smarty);
$controller->display();
