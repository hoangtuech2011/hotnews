<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...

 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
// 	$accWebpages = array(
// 		"thoi-su","the-gioi","the-thao","kinh-doanh","giai-tri","phap-luat","suc-khoe","gia-dinh","khoa-hoc","giao-duc","du-lich","video"
// 	);
	//$title = "trum-buon-ban-lo-go-xe-vua-ra-dau-thu";
	Router::connect('/', array('controller' => 'Home', 'action' => 'index'));
// 	$item = 'thoi-su';
// 	Router::connect('/tin-tuc/'.$item.'/'.$title.'.html', array('controller' => 'Home', 'action' => 'category',$item,$title));
// 	foreach ($accWebpages as $item)
// 	{
		//Router::connect('/tin-tuc/'.$item.'/'.$title.'html', array('controller' => 'Home', 'action' => 'category',$item,$title));
		Router::connect('/tin-tuc/*', array('controller' => 'Home', 'action' => 'category'));
// 	}
	//er::connect('/tin-tuc/the-thao/', array('controller' => 'Home', 'action' => 'category','the-thao'));
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
