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
        $this->loadModel('Cards');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue 
        $this->Authentication->addUnauthenticatedActions(['login', 'register', 'token', 'activatecard']);
    }

    public function register()
    {
        $this->Authorization->skipAuthorization();


        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // $user->birth_date = date('Y-m-d', strtotime($this->request->getData('birth_date')));
            $user->token = $this->Common->generateToken(50);
            if ($user = $this->Users->save($user)) {
                $msg = 1;
                $mail = $this->Email->send_verification_email($user);
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

    public function activatecard($token = null)
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->findByToken($token)->first();


        $this->request->allowMethod(['get', 'post']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $card = $this->Cards->find('all', ['conditions' => ['serial_code' => $this->request->getData('serial_code')]])->first();
            // dd($card);
            $user = $this->Users->patchEntity($user, ['card_id' => $card->id, 'serial_code' => $this->request->getData('serial_code'), 'verification_code' => $this->request->getData('verification_code')]);
            if (!$card) {
                $this->Flash->error(__('Card with entered serial code is not found. Please try again.'));
            } else {
                if ($card->verification_code != $this->request->getData('verification_code')) {
                    $this->Flash->error(__('Could not activate card. Please try again.'));
                } else {
                    $user->card_id = $card->id;
                    $user->serial_code = $this->request->getData('serial_code');
                    $user->verification_code = $this->request->getData('verification_code');
                    $user->activated = 1;
                    if ($this->Users->save($user)) {

                        $this->Flash->success(__('The card is now activated and linked to user.'));
                        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                    }
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }
        }
        // dd($userbytoken);
        $this->set(compact('user'));
    }


    public function login()
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in 
        if ($result->isValid()) {
            // redirect to /articles after login success
            // dd($result->getData()->role_id);
            if ($result->getData()->role_id == 2) {

                $redirect = $this->redirect('/');
            }
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
        $this->Authorization->skipAuthorization();
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
        // $loggedinuser = $this->Authentication->getIdentity()->getOriginalData();
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->authorize($user, 'index');


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

                //return $this->redirect(['action' => 'profile']);
                return $this->redirect(['controller' => 'Users', 'action' => 'profile/' . $this->Authentication->getIdentity()->getIdentifier()]);
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

                //return $this->redirect(['action' => 'profile']);
                return $this->redirect(['controller' => 'Users', 'action' => 'profile/' . $this->Authentication->getIdentity()->getIdentifier()]);
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

                        //return $this->redirect(['action' => 'profile']);
                        return $this->redirect(['controller' => 'Users', 'action' => 'profile/' . $this->Authentication->getIdentity()->getIdentifier()]);
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
                'day' => 'DATE_FORMAT(meeting_date,"%d")',
                'time_from' => 'DATE_FORMAT(time_from,"%h:%i %p")',
                'time_to' => 'DATE_FORMAT(time_to,"%h:%i %p")'
            ])
            ->where(['user_id' => $id]);

        return [$socials, $music_videos, $meetings];
    }
    public function view($id = null)
    {

        $user = $this->Users->newEmptyEntity();
        $this->Authorization->authorize($user, 'view');
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

    public function allsocial($id = null)
    {
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->skipAuthorization();
        $user = $this->Users->get($id, [
            'contain' => ['SocialMedia'],
        ]);

        //get data from function getUserData() returns $array
        $data = $this->getUserData($id);
        $socials = $data[0];

        $this->set(compact('socials'));
        $this->set(compact('user'));
    }

    public function allmeeting($id = null)
    {
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->skipAuthorization();
        $user = $this->Users->get($id, [
            'contain' => ['Meetings'],
        ]);

        //get data from function getUserData() returns $array
        $data = $this->getUserData($id);
        $meetings = $data[2];

        $this->set(compact('meetings'));
        $this->set(compact('user'));
    }

    public function allmusicvideo($id = null)
    {
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->skipAuthorization();
        $user = $this->Users->get($id, [
            'contain' => ['MusicVideo'],
        ]);

        //get data from function getUserData() returns $array
        $data = $this->getUserData($id);
        $music_videos = $data[1];

        $this->set(compact('music_videos'));
        $this->set(compact('user'));
    }

    public function token($token = null)
    {
        $this->Authorization->skipAuthorization();

        // dd($this->request->getPath());
        if (!$token && $this->request->getPath() == '/') {
            // dd($this->Authentication->getIdentity()->getOriginalData()->token);
            if ($user = $this->request->getAttribute('identity') == null) {
                return $this->redirect('/users/login');
            }
            $token = $this->Authentication->getIdentity()->getOriginalData()->token;
        }
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
        $this->Authorization->authorize($user, 'add');
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
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->authorize($user, 'edit');
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
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->authorize($user, 'delete');
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
