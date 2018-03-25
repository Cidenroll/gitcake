<?php
App::uses('AppController', 'Controller');
/**
 * Bitballs Controller
 *
 * @property Bitball $Bitball
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class BitballsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Bitball->recursive = 0;
		$this->set('bitballs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bitball->exists($id)) {
			throw new NotFoundException(__('Invalid bitball'));
		}
		$options = array('conditions' => array('Bitball.' . $this->Bitball->primaryKey => $id));
		$this->set('bitball', $this->Bitball->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bitball->create();
			if ($this->Bitball->save($this->request->data)) {
				$this->Flash->success(__('The bitball has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The bitball could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bitball->exists($id)) {
			throw new NotFoundException(__('Invalid bitball'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bitball->save($this->request->data)) {
				$this->Flash->success(__('The bitball has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The bitball could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bitball.' . $this->Bitball->primaryKey => $id));
			$this->request->data = $this->Bitball->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bitball->id = $id;
		if (!$this->Bitball->exists()) {
			throw new NotFoundException(__('Invalid bitball'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Bitball->delete()) {
			$this->Flash->success(__('The bitball has been deleted.'));
		} else {
			$this->Flash->error(__('The bitball could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
