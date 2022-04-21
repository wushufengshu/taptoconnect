<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * UserCards Controller
 *
 * @property \App\Model\Table\UserCardsTable $UserCards
 * @method \App\Model\Entity\UserCard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserCardsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Authorization->skipAuthorization();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->Authentication->getIdentity();
        $conditions = [];
        $contain = ['Users', 'Cards'];
        if ($user->role_id != 1) {
            $conditions = ['UserCards.user_id ' => $user->id];
        }
        // $userCards = $this->paginate($this->UserCards);
        $userCards = $this->UserCards->find('all')->where($conditions)->contain($contain)->all();


        $this->set(compact('userCards'));
    }

    /**
     * View method
     *
     * @param string|null $id User Card id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userCard = $this->UserCards->get($id, [
            'contain' => ['Users', 'Cards'],
        ]);

        $this->set(compact('userCard'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userCard = $this->UserCards->newEmptyEntity();
        if ($this->request->is('post')) {
            $userCard = $this->UserCards->patchEntity($userCard, $this->request->getData());
            if ($this->UserCards->save($userCard)) {
                $this->Flash->success(__('The user card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user card could not be saved. Please, try again.'));
        }
        $users = $this->UserCards->Users->find('list', ['limit' => 200])->all();
        $cards = $this->UserCards->Cards->find('list', ['limit' => 200])->all();
        $this->set(compact('userCard', 'users', 'cards'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Card id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userCard = $this->UserCards->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userCard = $this->UserCards->patchEntity($userCard, $this->request->getData());
            if ($this->UserCards->save($userCard)) {
                $this->Flash->success(__('The user card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user card could not be saved. Please, try again.'));
        }
        $users = $this->UserCards->Users->find('list', ['limit' => 200])->all();
        $cards = $this->UserCards->Cards->find('list', ['limit' => 200])->all();
        $this->set(compact('userCard', 'users', 'cards'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Card id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userCard = $this->UserCards->get($id);
        if ($this->UserCards->delete($userCard)) {
            $this->Flash->success(__('The user card has been deleted.'));
        } else {
            $this->Flash->error(__('The user card could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
