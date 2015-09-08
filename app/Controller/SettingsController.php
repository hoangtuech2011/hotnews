<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'simple_html_dom');

/**
 * Settings Controller
 *
 * @property Setting $Setting
 * @property PaginatorComponent $Paginator
 */
class SettingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->loadModel('Category');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Setting->recursive = 0;
		$this->Paginator->settings['order'] = array('id' => 'desc');
		$this->Paginator->settings['limit'] = 1000;
		$this->set('settings', $this->Paginator->paginate());
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
		$this->set('setting', $this->Setting->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Setting->create();
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('The setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
			}
		}
		$pages = $this->Setting->Page->find('list');
		$categories = $this->treeMenu();//$this->Setting->Category->find('list');
		$this->set(compact('pages', 'categories'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('The setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
			$this->request->data = $this->Setting->find('first', $options);
		}
		$pages = $this->Setting->Page->find('list');
		$categories = $categories = $this->treeMenu();//$this->Setting->Category->find('list');
		$this->set(compact('pages', 'categories'));
	}
	
	
	public function copy($id = null) {
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('The setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
			$this->request->data = $this->Setting->find('first', $options);
		}
		$pages = $this->Setting->Page->find('list');
		$categories = $this->treeMenu();//$this->Setting->Category->find('list');
		$this->set(compact('pages', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Setting->id = $id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__('Invalid setting'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Setting->delete()) {
			$this->Session->setFlash(__('The setting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The setting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	private function saveNews($link, $root, $image, $tilte_link, $description, $hot, $high_lights, $page_id, $category_id,$page_link, $step = null)
	{
		$flag = true;
		try{
			$html = file_get_html($link);
			foreach ($html->find($root) as $div)
			{
				//echo $div->innertext."<br>";
				$news = array();
				//echo $div->innertext;
				$title = "";
				foreach ($div->find($image) as $img)
				{
					
					$fileinfo = pathinfo($img->src);
					$filename = explode(".", $fileinfo['basename']);
					$news['url_image'] = $fileinfo['dirname'].'/'.$filename[0].'.'.$filename[1];
					$this->log(print_r($news['url_image'], true), LOG_DEBUG);
					//$news['url_image'] = $img->src;//;
				}
				foreach ($div->find($tilte_link) as $a)
				{
					if(empty($a->title))
					{
						$news['title'] = strip_tags($a->innertext);
						$title = $a->innertext;
					}
					else 
					{
						$news['title'] = strip_tags($a->title);
						$temp = str_replace(" ", "-", strtolower($this->stripUnicode(strip_tags($a->title))));
						$news['title_no_unicode'] = preg_replace("/[^A-Za-z0-9-]/", '', $temp);
						$title = $a->title;
					}
					if (!filter_var($a->href, FILTER_VALIDATE_URL) === false)
						$news['address'] = $a->href;
					else 
						$news['address'] = $page_link.$a->href;
				}
				foreach ($div->find($description) as $des)
					$news['description'] = strip_tags($des->innertext);
				$title = str_replace("&nbsp;", "",$title);
				if(!empty($title)  && count($news) > 0)
				{
					$news['hot'] = $hot;
					$news['high_lights'] = $high_lights;
					$news['page_id'] = $page_id;
					$news['category_id'] = $category_id;
					if ($this->New->find('count', array(
							'conditions' => array('address' => $news['address'])
					)) ==0) {
						$this->New->saveAll($news);
					}
				}
	
			}
		}catch (Exception $e)
		{
			$flag = false;
			$this->Session->setFlash('Can not get news.');
		}
		$this->autoRender = false;
		$this->set('_serialize',$flag);
		//die();
	}
	private function Test($link, $root, $image, $tilte_link, $description, $hot, $page_id, $category_id, $page_link, $step = null)
	{
		try{
			
			$html = file_get_html($link);
			//$i=0;
			foreach ($html->find($root) as $div)
			{
				echo "root".$div->innertext."</br>";
				foreach ($div->find($image) as $img)
					echo "img:".$img->src."<br>";
					//break;
				foreach ($div->find($tilte_link) as $a)
				{
					if(empty($a->title))
						echo "title:".strip_tags($a->innertext) . "<br>";
					else
					{ 
						echo "title:".strip_tags($a->title) . "<br>";
						$temp = str_replace(" ", "-", strtolower($this->stripUnicode(strip_tags($a->title))));
						echo "title_no_unicode:".preg_replace("/[^A-Za-z0-9-]/", '', $temp). "<br>";
					}
					if (!filter_var($a->href, FILTER_VALIDATE_URL) === false)
						echo "href".$a->href ."<br>";
					else
						echo "href:".$page_link.$a->href."<br>";
					
					//break;
				}
				$i = 0;
				foreach ($div->find($description) as $des)
				{
					if($i == $step)
						echo "des".strip_tags($des->innertext) . "</br>";
					$i++;
				}

				
			}
	
		}catch (Exception $e)
		{
			$this->Session->setFlash('Can not get news.');
		}
		//echo "<pre>"; print_r($news);
		$this->autoRender = false;
	}
	public function getNews($id = null)
	{
		$this->loadModel('New');
		$options['fields'] = array(
							'Setting.link','Setting.root','Setting.image','Setting.title_link','Setting.description','Setting.hot','Setting.high_lights','Setting.page_id', 'Setting.category_id','Setting.step','Page.link'
		);
		if (empty($id)) {
			$options['conditions'] = array('Setting.active' => 1);
			$settings = $this->Setting->find('all',$options);
			//echo "<pre>"; print_r($settings); die();
			foreach ($settings as $setting)
			{
				$link = $setting['Setting']['link'];
				$root = $setting['Setting']['root'];
				$image = $setting['Setting']['image'];
				$title_link = $setting['Setting']['title_link'];
				$description = $setting['Setting']['description'];
				$hot = $setting['Setting']['hot'];
				$high_lights = $setting['Setting']['high_lights'];
				$page_id = $setting['Setting']['page_id'];
				$category_id = $setting['Setting']['category_id'];
				$page_link = $setting['Page']['link'];
				$step = $setting['Setting']['step'];
				$this->saveNews($link, $root, $image, $title_link, $description, $hot, $high_lights, $page_id, $category_id,$page_link,$step);
			}	
		}
		else 
		{
			$options['conditions'] = array('Setting.id' => $id, 'Setting.active' => 1);
			$settings = $this->Setting->find('all',$options);
			foreach ($settings as $setting)
			{
				$link = $setting['Setting']['link'];
				$root = $setting['Setting']['root'];
				$image = $setting['Setting']['image'];
				$title_link = $setting['Setting']['title_link'];
				$description = $setting['Setting']['description'];
				$hot = $setting['Setting']['hot'];
				$page_id = $setting['Setting']['page_id'];
				$category_id = $setting['Setting']['category_id'];
				$page_link = $setting['Page']['link'];
				$step = $setting['Setting']['step'];
				$this->Test($link, $root, $image, $title_link, $description, $hot, $page_id, $category_id,$page_link,$step);
			}
		}
		
	}
}
