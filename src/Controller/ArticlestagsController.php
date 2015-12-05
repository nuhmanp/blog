<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articlestags Controller
 *
 * @property \App\Model\Table\ArticlestagsTable $Articlestags
 */
class ArticlestagsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles', 'Tags']
        ];
        $this->set('articlestags', $this->paginate($this->Articlestags));
        $this->set('_serialize', ['articlestags']);
    }

    /**
     * View method
     *
     * @param string|null $id Articlestag id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlestag = $this->Articlestags->get($id, [
            'contain' => ['Articles', 'Tags']
        ]);
        $this->set('articlestag', $articlestag);
        $this->set('_serialize', ['articlestag']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlestag = $this->Articlestags->newEntity();
        if ($this->request->is('post')) {
            $articlestag = $this->Articlestags->patchEntity($articlestag, $this->request->data);
            if ($this->Articlestags->save($articlestag)) {
                $this->Flash->success(__('The articlestag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The articlestag could not be saved. Please, try again.'));
            }
        }
        $articles = $this->Articlestags->Articles->find('list', ['limit' => 200]);
        $tags = $this->Articlestags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('articlestag', 'articles', 'tags'));
        $this->set('_serialize', ['articlestag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Articlestag id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlestag = $this->Articlestags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlestag = $this->Articlestags->patchEntity($articlestag, $this->request->data);
            if ($this->Articlestags->save($articlestag)) {
                $this->Flash->success(__('The articlestag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The articlestag could not be saved. Please, try again.'));
            }
        }
        $articles = $this->Articlestags->Articles->find('list', ['limit' => 200]);
        $tags = $this->Articlestags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('articlestag', 'articles', 'tags'));
        $this->set('_serialize', ['articlestag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Articlestag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlestag = $this->Articlestags->get($id);
        if ($this->Articlestags->delete($articlestag)) {
            $this->Flash->success(__('The articlestag has been deleted.'));
        } else {
            $this->Flash->error(__('The articlestag could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
