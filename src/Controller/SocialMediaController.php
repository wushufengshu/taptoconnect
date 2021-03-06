<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SocialMedia Controller
 *
 * @property \App\Model\Table\SocialMediaTable $SocialMedia
 * @method \App\Model\Entity\SocialMedia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SocialMediaController extends AppController
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
        $this->paginate = [
            'contain' => ['Users','SocialList'],
        ];
        $socialMedia = $this->paginate($this->SocialMedia);

        $this->set(compact('socialMedia'));
    }

    /**
     * View method
     *
     * @param string|null $id Social Media id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socialMedia = $this->SocialMedia->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('socialMedia'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $socialMedia = $this->SocialMedia->newEmptyEntity();
        if ($this->request->is('post')) {
            $socialMedia = $this->SocialMedia->patchEntity($socialMedia, $this->request->getData());

            $socialMedia->user_id = $this->Authentication->getIdentity()->getIdentifier();
            $url = preg_replace("(^https?://)", "", $socialMedia->social_link );
            $socialMedia->social_link = $url; //removes either http:// or https://

            if ($this->SocialMedia->save($socialMedia)) {
                $this->Flash->success(__('The social media has been saved.'));

                return $this->redirect(['controller' => 'Users','action' => 'allsocial/'.$this->Authentication->getIdentity()->getIdentifier()]);
            }
            $this->Flash->error(__('The social media could not be saved. Please, try again.'));
        }
        //$users = $this->SocialMedia->Users->find('list', ['limit' => 200])->all();
        $users = $this->SocialMedia->Users->find('list', [
            'keyField' => 'id',
            'valueField' => 'firstname'
        ]);

        $social_list = $this->SocialMedia->SocialList
        ->find('all');

        $this->set(compact('socialMedia', 'users','social_list'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Social Media id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $socialMedia = $this->SocialMedia->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socialMedia = $this->SocialMedia->patchEntity($socialMedia, $this->request->getData());

            $url = preg_replace("(^https?://)", "", $socialMedia->social_link );
            $socialMedia->social_link = $url; //removes either http:// or https://
            
            if ($this->SocialMedia->save($socialMedia)) {
                $this->Flash->success(__('The social media has been saved.'));

                return $this->redirect(['controller' => 'Users','action' => 'allsocial/'.$this->Authentication->getIdentity()->getIdentifier()]);
            }
            $this->Flash->error(__('The social media could not be saved. Please, try again.'));
        }
        //$users = $this->SocialMedia->Users->find('list', ['limit' => 200])->all();
        $users = $this->SocialMedia->Users->find('list', [
            'keyField' => 'id',
            'valueField' => 'firstname'
        ]);

        $social_list = $this->SocialMedia->SocialList
        ->find('all');
        
        $this->set(compact('socialMedia', 'users','social_list'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Social Media id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socialMedia = $this->SocialMedia->get($id);
        if ($this->SocialMedia->delete($socialMedia)) {
            $this->Flash->success(__('The social media has been deleted.'));
        } else {
            $this->Flash->error(__('The social media could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Users','action' => 'allsocial/'.$this->Authentication->getIdentity()->getIdentifier()]);
    }
}
