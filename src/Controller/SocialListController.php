<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SocialList Controller
 *
 * @property \App\Model\Table\SocialListTable $SocialList
 * @method \App\Model\Entity\SocialList[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SocialListController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $socialList = $this->paginate($this->SocialList);

        $this->set(compact('socialList'));
    }

    /**
     * View method
     *
     * @param string|null $id Social List id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socialList = $this->SocialList->get($id, [
            'contain' => ['SocialMedia'],
        ]);

        $this->set(compact('socialList'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $socialList = $this->SocialList->newEmptyEntity();
        if ($this->request->is('post')) {
            $socialList = $this->SocialList->patchEntity($socialList, $this->request->getData());
            if ($this->SocialList->save($socialList)) {
                $this->Flash->success(__('The social list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social list could not be saved. Please, try again.'));
        }
        $this->set(compact('socialList'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Social List id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $socialList = $this->SocialList->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socialList = $this->SocialList->patchEntity($socialList, $this->request->getData());
            if ($this->SocialList->save($socialList)) {
                $this->Flash->success(__('The social list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social list could not be saved. Please, try again.'));
        }
        $this->set(compact('socialList'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Social List id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socialList = $this->SocialList->get($id);
        if ($this->SocialList->delete($socialList)) {
            $this->Flash->success(__('The social list has been deleted.'));
        } else {
            $this->Flash->error(__('The social list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
