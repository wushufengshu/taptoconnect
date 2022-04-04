<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MusicVideo Controller
 *
 * @property \App\Model\Table\MusicVideoTable $MusicVideo
 * @method \App\Model\Entity\MusicVideo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MusicVideoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $musicVideo = $this->paginate($this->MusicVideo);

        $this->set(compact('musicVideo'));
    }

    /**
     * View method
     *
     * @param string|null $id Music Video id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $musicVideo = $this->MusicVideo->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('musicVideo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $musicVideo = $this->MusicVideo->newEmptyEntity();
        if ($this->request->is('post')) {
            $musicVideo = $this->MusicVideo->patchEntity($musicVideo, $this->request->getData());
            if ($this->MusicVideo->save($musicVideo)) {
                $this->Flash->success(__('The music video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The music video could not be saved. Please, try again.'));
        }
        $users = $this->MusicVideo->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('musicVideo', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Music Video id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $musicVideo = $this->MusicVideo->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $musicVideo = $this->MusicVideo->patchEntity($musicVideo, $this->request->getData());
            if ($this->MusicVideo->save($musicVideo)) {
                $this->Flash->success(__('The music video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The music video could not be saved. Please, try again.'));
        }
        $users = $this->MusicVideo->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('musicVideo', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Music Video id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $musicVideo = $this->MusicVideo->get($id);
        if ($this->MusicVideo->delete($musicVideo)) {
            $this->Flash->success(__('The music video has been deleted.'));
        } else {
            $this->Flash->error(__('The music video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
