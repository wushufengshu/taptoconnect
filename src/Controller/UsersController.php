<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Authorization->skipAuthorization();
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue 
        $this->Authentication->addUnauthenticatedActions(['login', 'register']);
    }

    public function register()
    {
        // $this->Authorization->skipAuthorization();


        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // $user->birth_date = date('Y-m-d', strtotime($this->request->getData('birth_date')));
            $user->token = $this->Common->generateToken(50);
            if ($user = $this->Users->save($user)) {
                $msg = 1;
                // $this->Flash->error(__('Could not create account. Please try again'));
            } else {
                $msg = 2;
                $this->Flash->error(__('Could not create account. Please try again'));
            }

            $response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['data' => $user, 'msg' => $msg]));
            return $response;
        }
        $this->set(compact('user'));
    }


    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        if (isset($_POST['activate'])) {
            $activateUser = $this->Users->query();
            $activateUser->update()
                ->set([
                    'activated' => 1
                ])
                ->where([
                    'id' => $_POST['userid']
                ])
                ->execute();

            $this->Flash->success(__('User Account has been activated!'));
            return $this->redirect(['action' => 'index']);
        }

        if (isset($_POST['deactivate'])) {
            $activateUser = $this->Users->query();
            $activateUser->update()
                ->set([
                    'activated' => 0
                ])
                ->where([
                    'id' => $_POST['userid']
                ])
                ->execute();

            $this->Flash->success(__('User Account has been deactivated!'));
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('users'));
    }

    public function profile()
    {

        $this->Authorization->skipAuthorization();

        // $user = $this->Users->get($id, [
        //     'contain' => [],
        // ]); 
        $user = $this->Users->get($this->Authentication->getIdentity()->getIdentifier());

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));
                $this->Authentication->setIdentity($user);
                // dd($request->getAttribute('identity'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
            $this->Common->dblogger([
                //change depending on action
                'message' => 'Unable to update profile',
                'request' => $this->request,
            ]);
        }
        $userRole = $this->Users->UserRoles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'userRole'));
    }

    public function changeprofilepicture()
    {
        $this->Authorization->skipAuthorization();

        // $user = $this->Users->get($id, [
        //     'contain' => [],
        // ]); 
        $user = $this->Users->get($this->Authentication->getIdentity()->getIdentifier());

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $image = $this->request->getData('image_file');
            $fileName = $image->getClientFilename();
            // dd($image);
            $user->image = $fileName;
            if ($this->Users->save($user)) {

                if (!$user->getErrors()) {
                    // never trust anything in `$image` if you haven't properly validated it!!!

                    if (!is_dir(WWW_ROOT . 'img/uploads/profilepicture' . DS . $user->id))
                        mkdir(WWW_ROOT . 'img/uploads/profilepicture' . DS . $user->id);

                    if ($fileName) {
                        $image->moveTo(WWW_ROOT . 'img/uploads/profilepicture' . DS . $user->id . '/' . DS . $fileName);
                    }
                }

                $this->Flash->success(__('The user has been saved.'));
                $this->Authentication->setIdentity($user);
                // dd($request->getAttribute('identity'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
            $this->Common->dblogger([
                //change depending on action
                'message' => 'Unable to update profile',
                'request' => $this->request,
            ]);
        }
        $userRole = $this->Users->UserRoles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'userRole'));
    }

    public function changepassword($id = null)
    {
        $this->Authorization->skipAuthorization();

        $setid = $this->Authentication->getIdentity()->getIdentifier();
        if ($id) {
            $loggedinuser = $this->Authentication->getIdentity()->getOriginalData();
            $this->Authorization->authorize($loggedinuser, 'changepassword ');
            $setid = $id;
        }


        $user =  $this->Users->get($setid);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestData = $this->request->getData();
            if (password_verify($requestData['currentpassword'], $user->password)) {
                if ($requestData['newpassword'] === $requestData['retypepassword']) {

                    $user = $this->Users->patchEntity($user, ['password' => $this->request->getData('newpassword')]);
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Password changed successfully'));

                        return $this->redirect(['action' => 'profile']);
                    }
                    $this->Flash->error(__('The password could not be saved. Please, try again.'));
                } else {
                    $this->Flash->error(__('New and retype password does not match. Please, try again'));
                }
            } else {
                $this->Flash->error(__('Entered old password doesn\'t matched old password from the database'));
            }
        }
        $this->set(compact('user'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function getUserData($id)
    {
        $socials = $this->Users->SocialMedia
            ->find('all')
            ->select([
                'id', 'user_id', 'social_list_id', 'social_link',
                'image' => 'sl.image',
            ])
            ->join([
                'table' => 'social_list',
                'alias' => 'sl',
                'type' => 'INNER',
                'conditions' => 'sl.id = social_list_id',
            ])
            ->where(['user_id' => $id]);

        $music_videos = $this->Users->MusicVideo
            ->find('all')
            ->where(['user_id' => $id]);

        $meetings = $this->Users->Meetings
            ->find('all')
            ->select([
                'id', 'user_id', 'meeting_date', 'meeting_name', 'time_from', 'time_to', 'organized_by', 'meeting_place',
                'month' => 'DATE_FORMAT(meeting_date,"%b")',
                'day' => 'DATE_FORMAT(meeting_date,"%d")'
            ])
            ->where(['user_id' => $id]);

        return [$socials, $music_videos, $meetings];
    }
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Meetings', 'MusicVideo', 'SocialMedia'],
        ]);

        //get data from function getUserData() returns $array
        $data = $this->getUserData($id);
        $socials = $data[0];
        $music_videos = $data[1];
        $meetings = $data[2];


        $this->set(compact('user', 'socials', 'meetings', 'music_videos'));
        $this->set(compact('user'));
    }
    public function token($token = null)
    {
        $this->view = 'view';
        $userbytoken = $this->Users->findByToken($token)->first();
        $user = $this->Users->get($userbytoken->id, [
            'contain' => ['Meetings', 'MusicVideo'],
        ]);

        //get data from function $array
        $data = $this->getUserData($user->id);
        $socials = $data[0];
        $music_videos = $data[1];
        $meetings = $data[2];


        $this->set(compact('user', 'socials', 'meetings', 'music_videos'));
        $this->render('/Users/view');
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 1;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
