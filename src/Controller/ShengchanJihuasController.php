<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class ShengchanJihuasController extends AppController
    {
        public function index()
        {
		    //$this->loadComponent('Paginator');
		    // $arttools = $this->Paginator->paginate($this->Arttools->find());
		    // $this->set(compact('lailiao'));		
        }
		public function add()
        {
			// $this->loadComponent('Paginator');
			// $lailiaoInitial = $this->Curriculums->newEntity();
			// if ($this->request->is('post')) {
				// return $this->redirect(['action' => 'index']);
			// }
			// $this->set('curriculum', $curriculum);		
        }
		public function modify()
        {
			//return $this->redirect(['action' => 'index']);
		    //$this->loadComponent('Paginator');
		    // $arttools = $this->Paginator->paginate($this->Arttools->find());
		    // $this->set(compact('lailiao'));		
        }
		public function print()
        {
				
        }
		public function delete($id)
        {
			return $this->redirect(['action' => 'index']);
			
			//$this->request->allowMethod(['post', 'delete']);

			//$curriculum = $this->Curriculums->findById($id)->firstOrFail();
			//if ($this->Curriculums->delete($curriculum)) {
			//	$this->Flash->success(__('The {0} curriculum has been deleted.', $curriculum->kechengmingcheng));
			//	return $this->redirect(['action' => 'index']);
			//}
        }

    }
