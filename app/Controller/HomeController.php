<?php
App::uses('AppController', 'Controller');
/**
 * Pages Controller
 *
 * @property Page $Page
 * @property PaginatorComponent $Paginator
 */
class HomeController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index','category');
	}
/**
 * index method
 *
 * @return void
 */
	private function loadCategories()
	{
		$this->loadModel('Category');
		$this->Category->recursive = 0;
		$categories = $this->Category->find('all',array(
			'fields' => array('id','name','name_no_unicode','location'),
			'order' => array('position' => 'ASC'),
			'conditions' => array('active' => 1, 'parent_id' => null)	
		));
		return $categories;
	}
	public function index() {
		$currentTime = "Today is " .date("l"). date(" d/m/Y h:i:sa") . "<br>";
		$categories = $this->loadCategories();
		
		$this->loadModel('New');
		$joins = array(
			array(
				'table' => 'categories',
				'alias' => 'Category',
				'type' => 'LEFT',
				'conditions' =>  array('New.category_id = Category.id')		
			)	
		);
		$high_lights = $this->getHighLights(null,$joins);
		$hot_news = $this->getNewsHot(null, $joins);
		//echo "<pre>"; print_r($hot_news); die();
		$last_news = $this->getLastNews(null, $joins);
 		$most_view_news = $this->getMostViewedNews(null, $joins);
		$this->set(compact('high_lights','hot_news','last_news','pages','currentTime','categories','most_view_news'));
	}
	private function getHighLights($category_id = null, $joins = null) 
	{
		$option ['joins'] = $joins;
		if($category_id>0)
			$option['conditions'] = array('high_lights' => 1, 'category_id' => $category_id);
		else
			$option['conditions'] = array('high_lights' => 1);
		$option['fields'] = array('Category.name_no_unicode','address','title','title_no_unicode');
		$option['limit'] = 5;
		$option['order'] = array('New.id' => 'desc');
		$high_lights = $this->New->find('all', $option);
		return $high_lights;
	}
	private function getNewsHot($category_id = null, $joins = NULL)
	{
		$option['joins'] = $joins;
		if($category_id>0)
			$option['conditions'] = array('hot' => 1, 'category_id' => $category_id);
		else 
			$option['conditions'] = array('hot' => 1);
		$option['fields'] = array('Category.name_no_unicode', 'address','title','url_image','description','title_no_unicode');
		$option['limit'] = 5;
		$option['order'] = array('New.id' => 'desc');
		$hot_news = $this->New->find('all', $option);
		return $hot_news;
	}
	private function getLastNews($category_id = null, $joins = null)
	{
		$option['joins'] = $joins;
		if($category_id>0)
			$option['conditions'] = array('category_id' => $category_id,'hot' => 0,array('not'=> array('url_image' => null)));
		else
			$option['conditions'] = array('hot' => 0,array('not'=> array('url_image' => null)));
		$option['fields'] = array('Category.name_no_unicode','address','title','url_image','description','title_no_unicode');
		$option['limit'] = 5;
		$option['order'] = array('New.id' => 'desc');
		$last_news = $this->New->find('all',$option);
		return $last_news;
	}
	private function getMostViewedNews($category_id = null, $joins = null)
	{
		$option['joins'] = $joins;
		if($category_id>0)
			$option['conditions'] = array('category_id' => $category_id,'not'=> array('url_image' => null));
		else
			$option['conditions'] = array('not'=> array('url_image' => null));
		$option['fields'] = array('Category.name_no_unicode','address','title','url_image','description','views','title_no_unicode');
		$option['limit'] = 5;
		$option['order'] = array('views' => 'desc');
		$most_view_news = $this->New->find('all', $option);
		return $most_view_news;
	}
	public function getNews($category_id = null, $hot = null, $limit = null)
	{
		$this->loadModel('New');
		$news = $this->New->find('all', array(
						'joins' => array(
											array(
														'table' => 'categories',
												'alias' => 'Category',
												'type' => 'LEFT',
												'conditions' => array(
																'Category.id = New.category_id'
												)
									)
								),
						//'conditions' => array('New.title_no_unicode','url_image !=""','hot' => $hot, 'Category.id' => $category_id),
						'conditions' => array('url_image !=""','hot' => $hot, 'Category.id' => $category_id),
						'fields' => array('address','title','url_image','description','title_no_unicode'),
						'limit' => $limit,
						'order' => array('New.id' => 'desc')
		
				));
		return $news;
	}
	private function loadChildCategory($category_id)
	{
		$childCategory = $this->Category->find('all', array(
			'conditions' => array('parent_id' => $category_id),
			'fields' => array('id','name', 'name_no_unicode')	
		));
		return $childCategory;
	}
	public function category()
	{
		$count = count($this->request->params['pass']);
		$title_no_unicode = $this->request->params['pass'][$count -1];
		$error = false;
		$this->loadModel('New');
		$joins = array(
				array(
						'table' => 'categories',
						'alias' => 'Category',
						'type' => 'LEFT',
						'conditions' =>  array('New.category_id = Category.id')
				)
		);
		$this->loadModel('News');
		if(strpos($title_no_unicode, ".html")>0)
		{
			$title = explode(".", $title_no_unicode);
			$new = $this->News->find('all',array(
				'conditions' => array('title_no_unicode' => $title[0]),
				'fields' => 'address'	
			));
			if(count($new) > 0)
				$this->redirect($new[0]['News']['address']);
			else
				$error = true;
			
		}
		$this->loadModel('Category');
		$this->Category->recursive = -1;
		$category = $this->Category->find('first',array(
			'conditions' => array('name_no_unicode' => $title_no_unicode),
			'fields' => 'id'	
		));
		//echo "<pre>"; print_r($category); die();
		$hnews = $this->getNews($category['Category']['id'], 1, 1);
		$news = $this->getNews($category['Category']['id'], 0, 10000);
		$hot_news = $this->getNewsHot($category['Category']['id'], $joins);
		$categories = $this->loadCategories();
		$currentTime = "Today is " .date("l"). date(" d/m/Y h:i:sa") . "<br>";
		$high_lights = $this->getHighLights($category['Category']['id'], $joins);
		$last_news = $this->getLastNews($category['Category']['id'], $joins);
		$most_view_news = $this->getMostViewedNews($category['Category']['id'], $joins);
		$child_categories = $this->loadChildCategory($category['Category']['id']);
		//echo "<pre>"; print_r($child_category); die(); 
		$this->set(compact('child_categories','error','hot_news','hnews','news','categories','currentTime','high_lights','last_news','most_view_news'));
	}	
	
	
}
