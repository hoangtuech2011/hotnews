<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
/**
 * Pages Controller
 *
 * @property Page $Page
 * @property PaginatorComponent $Paginator
 */
class PagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
	public function beforeFilter()
	{
		parent::beforeFilter();
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
			'fields' => array('name'),
			'order' => array('position' => 'DESC')	
		));
		return $categories;
	}
	public function index() {
		$this->Page->recursive = 0;
		$pages = $this->Paginator->paginate();
		$currentTime = "Today is " .date("l"). date(" d/m/Y h:i:sa") . "<br>";
		$categories = $this->loadCategories();
		$this->set(compact('pages','currentTime','categories'));
		
	}
	public function hotNew()
	{
		$html = file_get_html("http://doisong.vnexpress.net/");
		$root = 'ul#news_home li';
		$img = 'div.thumb img'; //contain title;
		$title_link = 'div.thumb a';
		$description = 'div.news_lead';
		
	}
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Page->exists($id)) {
			throw new NotFoundException(__('Invalid page'));
		}
		$options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
		$this->set('page', $this->Page->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Page->create();
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
			}
		}
		$users = $this->Page->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Page->exists($id)) {
			throw new NotFoundException(__('Invalid page'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
			$this->request->data = $this->Page->find('first', $options);
		}
		$users = $this->Page->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			throw new NotFoundException(__('Invalid page'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Page->delete()) {
			$this->Session->setFlash(__('The page has been deleted.'));
		} else {
			$this->Session->setFlash(__('The page could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
