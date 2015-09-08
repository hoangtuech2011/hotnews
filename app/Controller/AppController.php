<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
public $components = array(
		    'Session',
		    'Auth' => array(
		        'loginRedirect' => array('controller' => 'news', 'action' => 'index'),
		        'logoutRedirect' => array(
		            'controller' => 'home',
		            'action' => 'index',
		        ),
		        'authenticate' => array(
		            'Form' => array(
		                'passwordHasher' => 'Blowfish'
		            )
		        ),
		        'authorize' => array('Controller') // Added this line
		    )
			
		);

// 	public function isAuthorized($user) {
// 	    // Admin can access every action
// // 	    if (isset($user['role']) && $user['role'] === 'admin') {
// // 	        return true;
// // 	    }
	
// // 	    // Default deny
// // 	    return false;
// 	}

	public function isAuthorized($user) {
		// Admin can access every action
// 		if (isset($user['role']) && $user['role'] === 'admin') {
// 			return true;
// 		}
	
		// Default deny
		return true;
	}
    public function beforeFilter() {
        $this->Auth->allow('getNews','checkNewNews','updateNewNews','updateViews');
        $this->layout = 'bootstrap';
    }
    public function stripUnicode($str)
    {
    	if(!$str) return false;
    	$unicode = array(
    		 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
    		 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
    		 'd'=>'đ',
    		 'D'=>'Đ',
    		 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
    			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
    			'i'=>'í|ì|ỉ|ĩ|ị',
    			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
    		 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
    			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
    		 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
    			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
    		 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
    		 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    	);
    	foreach($unicode as $khongdau=>$codau) {
    		$arr=explode("|",$codau);
    		$str = str_replace($arr,$khongdau,$str);
    	}
    	return $str;
    }
    
    
    public function treeMenu($parentid = NULL,$space = '', $trees = NULL){
    
    	if(!$trees) $trees = array();
    	$results = $this->Category->find('all',array('conditions'=>array('parent_id'=>$parentid)));
    	if($results!=''){
    		foreach($results as $result){
    			$trees [$result['Category']['id']] = $space.$result['Category']['name'];
    			$trees = $this->treeMenu($result['Category']['id'],$space.'--',$trees);
    		}
    			
    	}
    
    	return $trees;
    }
}
