<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 */
class NewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$pages = $this->News->Page->find('list');
		$categories = $this->News->Category->find('list');
		$this->set(compact('pages','categories'));
	}
	
	public function ajaxLoadDataNew(){
		$this->News->recursive = -1;
		$news = $this->News->find('all');
		$this->loadModel('Page');
		$this->loadModel('Category');
		$aColumns = array('html','id','title','url_image','name','name','views','hot');
		$table =    array('html','News','News','News','Page','Category','News','News');
		$sLimit = "";
		//set limit
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .",".$_GET['iDisplayLength'];
		}
		//Set where
		$sWhere = '';
		if ( $_GET['key_word'] != "" )
		{
			$sWhere = "AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				if($aColumns[$i]=='join' || $aColumns[$i]=='html'){
					continue;
				}
				$sWhere .= $table[$i].'.'.$aColumns[$i]." LIKE '%".$_GET['key_word']."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		if ( $_GET['page_id'] != "" )
			$sWhere .= ($sWhere!="") ? " AND page_id = ".$_GET['page_id']: " Where page_id = ".$_GET['page_id'] ; 
		if ( $_GET['category_id'] != "" )
			$sWhere .= ($sWhere!="") ? " AND category_id = ".$_GET['category_id']: " Where category_id = ".$_GET['category_id'];
		if ( isset( $_GET['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
			{
				if($aColumns[ intval( $_GET['iSortCol_'.$i] ) ]=='join' || $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]=='html'){
					continue;
				}
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
					". $_GET['sSortDir_'.$i]  .", ";
				}
			}
	
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "ORDER BY News.id DESC";
			}
		}
			$sql_total = 'SELECT
						count(News.id) AS total
						FROM news AS News
						LEFT JOIN
						pages AS Page
						ON
						Page.id = News.page_id
						LEFT JOIN
						categories AS Category
						ON
						Category.id = News.category_id';
					
		$sql = 'SELECT
					Page.id,Page.name, News.id, News.title, News.url_image, News.views,
					News.hot, News.show, News.active,News.created, Category.id, Category.name
					FROM news AS News
					LEFT JOIN
						pages AS Page
						ON
						Page.id = News.page_id
						LEFT JOIN
						categories AS Category
						ON
						Category.id = News.category_id
				';
	
					//$account_id = $_GET['account_id'];
	
					//echo $sql;exit();
// 		if($this->Session->read("Auth.User.parent_id")==''){
// 			$total_record_search = $this->News->query($sql_total.' '.$sWhere.' '.$sOrder);
// 			$total = $this->News->query($sql_total);
				
// 			if($account_id!=""){
// 			$sWhere = ($sWhere!='') ? $sWhere .= "AND Account.id=".$account_id:"WHERE Account.id=".$account_id;
// 					}
// 					$sql .= $sWhere.' '.$sOrder.' '.$sLimit;
// 					// 			echo $sql;exit();
// 					$Newss = $this->News->query($sql);
	
// 		}else{
// 			$sql_total .=  ' WHERE News.account_id ='.$this->Session->read("Auth.User.Role.account_id");
// 				$total = $this->ListeNews->query($sql_total);
					//$sWhere = ($sWhere!='') ? $sWhere.' AND News.account_id ='.$this->Session->read("Auth.User.Role.account_id"):' WHERE News.account_id ='.$this->Session->read("Auth.User.Role.account_id");
					// 			if($list_id!=""){
					// 				$sWhere .= "AND Liste.id=".$list_id;
// 			}
	//$sql .= ' WHERE News.account_id ='.$this->Session->read("Auth.User.Role.account_id");
	$sql .= $sWhere.' '.$sOrder.' '.$sLimit;
	//echo $sql_total.' '.$sWhere.' '.$sOrder; exit();
	$total_record_search = $this->News->query($sql_total.' '.$sWhere.' '.$sOrder);
	$News = $this->News->query($sql);
	
	//Total record filter
	$total = $this->News->query($sql_total);
	$iFilteredTotal = $total['0']['0']['total'];
	$iTotal = $total_record_search['0']['0']['total'];
		
	$output = array(
			"sEcho" => intval($_GET['sEcho']),
					"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
					"aaData" => array()
	);
	//echo count($aColumns); exit();
	foreach($News as $result){
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$html = '';
			$html .= '<a href="/News/edit/'.'/'.$result['News']['id'].'"><span class="fa fa-edit" data-original-title="Edit" data-toggle="tooltip"></span></a>';
			$html .= '<a href="/News/view/'.$result['News']['id'].'"><span class="fa fa-eye" data-original-title="View" data-toggle="tooltip"></span></a>';
			$html .= '<a onclick="javascript:checkCofirm('.$result['News']['id'].')" href="javascript:void(0)">';
			$html .= '<span class="fa fa-times" data-original-title="Remove" data-toggle="tooltip"></span>';
			$html .= '</a>';
			if($i==0)
				$row[] = $html;
			else 
			{
				if($aColumns[$i]=="url_image")
					$row[] = '<img src='.html_entity_decode($result[$table[$i]][$aColumns[$i]]).' width=120 height=100 />';
				else
					$row[] = html_entity_decode($result[$table[$i]][$aColumns[$i]]);
			}
		}
		$output['aaData'][] = $row;
	}
	echo json_encode($output);
	exit();
}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		}
		$pages = $this->News->Page->find('list');
		$types = $this->News->Type->find('list');
		$categories = $this->News->Category->find('list');
		$this->set(compact('pages', 'types', 'categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//echo "<pre>"; print_r($this->request->data); die();
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
		}
		$pages = $this->News->Page->find('list');
		$types = $this->News->Type->find('list');
		$categories = $this->News->Category->find('list');
		$this->set(compact('pages', 'types', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->News->delete()) {
			$this->Session->setFlash(__('The news has been deleted.'));
		} else {
			$this->Session->setFlash(__('The news could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function checkNewNews()
	{
		$category_name = $_POST['category_name'];
		$hot = $_POST['hot'];
		$count = $this->News->find('count', array(
			'conditions' => array(
					'Category.name' => $category_name,
					'News.new' => 1,
					'News.hot' => $hot
			)		
		));
		echo 1;//$count;
		exit();
	}
	
	public function updateNewNews()
	{
		$category_name = $_POST['category_name'];
		$hot = $_POST['hot'];
		$this->News->updateAll(
			array('News.new' => '0'),
			array('Category.name' => $category_name, 'News.hot' => $hot)
		);
		echo 1;
		exit();
	}
	
	public function updateViews()
	{
		$href = $_POST['href'];
		$this->News->updateAll(
			array('News.views' => 'News.views +1'),
			array('News.address' => $href)
		);
		echo 1;
		exit();
	}
}
