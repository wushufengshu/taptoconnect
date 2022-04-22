<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * UserVouchers Controller
 *
 * @property \App\Model\Table\UserVouchersTable $UserVouchers
 * @method \App\Model\Entity\UserVoucher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserVouchersController extends AppController
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
        $contain = ['Users', 'Vouchers'];
        if ($user->role_id != 1) {
            $conditions = ['UserVouchers.user_id ' => $user->id];
        }
        $userVouchers = $this->UserVouchers->find('all')->where($conditions)->contain($contain)->all();

        $this->set(compact('userVouchers'));
    }

    /**
     * View method
     *
     * @param string|null $id User Voucher id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userVoucher = $this->UserVouchers->get($id, [
            'contain' => ['Users', 'Vouchers'],
        ]);

        $this->set(compact('userVoucher'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userVoucher = $this->UserVouchers->newEmptyEntity();
        if ($this->request->is('post')) {
            $userVoucher = $this->UserVouchers->patchEntity($userVoucher, $this->request->getData());
            if ($this->UserVouchers->save($userVoucher)) {
                $this->Flash->success(__('The user voucher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user voucher could not be saved. Please, try again.'));
        }
        $users = $this->UserVouchers->Users->find('list', ['limit' => 200])->all();
        $vouchers = $this->UserVouchers->Vouchers->find('list', ['limit' => 200])->all();
        $this->set(compact('userVoucher', 'users', 'vouchers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Voucher id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userVoucher = $this->UserVouchers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userVoucher = $this->UserVouchers->patchEntity($userVoucher, $this->request->getData());
            if ($this->UserVouchers->save($userVoucher)) {
                $this->Flash->success(__('The user voucher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user voucher could not be saved. Please, try again.'));
        }
        $users = $this->UserVouchers->Users->find('list', ['limit' => 200])->all();
        $vouchers = $this->UserVouchers->Vouchers->find('list', ['limit' => 200])->all();
        $this->set(compact('userVoucher', 'users', 'vouchers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Voucher id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userVoucher = $this->UserVouchers->get($id);
        if ($this->UserVouchers->delete($userVoucher)) {
            $this->Flash->success(__('The user voucher has been deleted.'));
        } else {
            $this->Flash->error(__('The user voucher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
