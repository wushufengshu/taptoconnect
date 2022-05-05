<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Log\Log;
use Cake\Mailer\Mailer;
use Cake\I18n\FrozenDate;
use PHPMailer\PHPMailer\Exception;
use Cake\Http\Exception\NotFoundException;

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
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue  
        $this->Authentication->addUnauthenticatedActions(['login', 'register', 'token', 'activatecard', 'activateandregister', 'serial', 'sendemailyahoo', 'generatevcard']);
    }
    public function activateandregister()
    {
        $this->Authorization->skipAuthorization();

        $this->request->allowMethod(['get', 'post']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $card = $this->Cards->find('all', ['conditions' => ['serial_code' => $this->request->getData('serial_code')]])->first();
            // dd($card);

            if (!$card) {
                $this->Flash->error(__('Card with entered serial code is not found. Please try again.'));
            } else {
                if ($card->verification_code != $this->request->getData('verification_code')) {
                    $this->Flash->error(__('Could not verify card. Please try again.'));
                } else {
                    $this->Flash->success(__('The card is now in use, please enter user information.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'register', $card->serial_code]);
                }
            }
        }
    }
    //for testing
    public function sendemailyahoo()
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->get(1);
        // try {
        $mail = $this->Email->test($user);

        //     if (!$mail->send()) {
        //         echo json_encode(array(
        //             "status" => "error",
        //             "text" => "Mailer Error: " . $mail->ErrorInfo,
        //         ));
        //     } else {
        //         // return json_encode (['data' => $user, 'msg' => 1]);
        //         $response = $this->response->withType('application/json')
        //             ->withStringBody(json_encode(['data' => $user, 'msg' => 1]));
        //         return $response;
        //     }
        // } catch (Exception $th) {
        //     $msg = 3;
        // }
        // exit;
    }

    public function register($cardid = null)
    {
        $this->Authorization->skipAuthorization();

        // if ($user = $this->Authentication->getIdentity()) {
        //     return $this->redirect($this->referer());
        // } 

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $activateandregister = false;

            $user->token = $this->Common->generateToken(50);
            $link = "https://ubtap.myubplus.com.ph/users/activatecard/" . $user->token;
            $message = 'web_process_message';
            $subject = 'UBTap Card Activation';

            if ($this->request->getData('serialcode')) {
                $card = $this->Cards->find('all', ['conditions' => ['serial_code' => $this->request->getData('serialcode')]])->first();
                $expiration_date = date('Y-m-d', strtotime('+1 year'));
                $user->card_id = $card->id;
                $user->serial_code = $card->serial_code;
                $user->verification_code = $card->verification_code;
                $user->activated = 1;

                $user->expiration_date = $expiration_date;
                $activateandregister = true;
            }
            // $user->birth_date = date('Y-m-d', strtotime($this->request->getData('birth_date')));
            // $user->token = $this->Common->generateToken(50);

            if ($user = $this->Users->save($user)) {
                if ($activateandregister) {

                    $usercards = $this->UserCards->newEmptyEntity();
                    // $usercards = $this->UserCards->patchEntity(
                    //     $usercards,
                    //     ['user_id' => $user->id, 'card_id' => $card->id, 'expiration_date' => $expiration_date, 'status' => 1]
                    // );
                    $usercards->user_id = $user->id;
                    $usercards->card_id = $card->id;
                    $usercards->expiration_date = $expiration_date;
                    $usercards->status = 1;
                    $usercards = $this->UserCards->save($usercards);
                    // if (!$usercards) {
                    //     $this->Flash->error(__('Could not save card details. Please try again'));
                    //     return $this->redirect(['controller' => 'Users', 'action' => 'register']);
                    // }

                    $link = "https://ubtap.myubplus.com.ph/users/login";
                    $message = 'card_process_message';
                    $subject = 'Welcome to UB Tap!';
                }

                $message = $this->Message->emailMsg($message, $user, $link);
                $msg = 1;
                try {
                    $mail = $this->Email->send_verification_email($user, $message, $subject);
                    if (!$mail->send()) {
                        echo json_encode(array(
                            "status" => "error",
                            "text" => "Mailer Error: " . $mail->ErrorInfo,
                        ));
                    } else {
                        // return json_encode (['data' => $user, 'msg' => 1]);
                        $response = $this->response->withType('application/json')
                            ->withStringBody(json_encode(['data' => $user, 'msg' => 1]));
                        return $response;
                    }
                } catch (Exception $th) {
                    $msg = 3;
                }
                exit;
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
    public function extendviavoucher($voucher)
    {

        $this->Authorization->skipAuthorization();
        dd(1);
    }
    public function activatecard($token = null)
    {
        $this->Authorization->skipAuthorization();
        if (!$token && $loggedinuser = $this->Authentication->getIdentity()->getOriginalData()) {
            $token = $loggedinuser->token;
        }

        $user = $this->Users->findByToken($token)->contain(['UserCards'])->first();
        $this->request->allowMethod(['get', 'post']);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->bindusertocard($this->request, $user);
        }
        // dd($userbytoken);
        $this->set(compact('user'));
    }
    public function bindusertocard($request, $user)
    {
        $card = $this->Cards->find('all', ['conditions' => ['serial_code' => $request->getData('serial_code')]])->first();
        // dd($card);

        if (!$card) {
            $this->Flash->error(__('Card with entered serial code is not found. Please try again.'));
        } else {
            $user = $this->Users->patchEntity($user, ['card_id' => $card->id, 'serial_code' => $request->getData('serial_code'), 'verification_code' => $request->getData('verification_code')]);
            if ($card->verification_code != $request->getData('verification_code')) {
                $this->Flash->error(__('Could not activate card. Please try again.'));
            } else {
                $currentDate = new FrozenDate(date('Y-m-d'));
                //get currently used card 
                $currentcard = $this->UserCards->find('all')->where(['user_id' => $user->id, 'status' => 1, 'expiration_date' <= $currentDate])->first();
                $expiration_date = $currentDate->addYear();
                if ($currentcard) {
                    $currentcard = $this->UserCards->patchEntity($currentcard, ['status' => 2]);
                    $currentcard->status = 2;

                    if ($this->UserCards->save($currentcard)) {
                        $expiration_date = $currentcard->expiration_date->addDay()->addYear();
                    }
                }

                $usercards = $this->UserCards->newEmptyEntity();
                // condition kapag nagka new subscription si user based on status
                $usercards = $this->UserCards->patchEntity($usercards, ['user_id' => $user->id, 'card_id' => $card->id, 'expiration_date' => $expiration_date, 'status' => 1]);
                if ($this->UserCards->exists([$user->id, 'card_id' => $card->id])) {
                    $this->Flash->error(__('The card has already been activated.'));
                } elseif ($this->UserCards->save($usercards)) {
                    $user->card_id = $card->id;
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The card is now activated and linked to user.'));
                        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                    }
                } else {
                    $this->Flash->error(__('The card could not be saved. Please, try again.'));
                }
            }
        }
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
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->authorize($user, 'index');

        //$users = $this->paginate($this->Users);
        $users = $this->Users->find()->all();
        // $loggedinuser = $this->Authentication->getIdentity()->getOriginalData();


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
            ->where(['user_id' => $id])
            ->order(['SocialMedia.social_link' => 'asc']);

        $music_videos = $this->Users->MusicVideo
            ->find('all')
            ->where(['user_id' => $id])
            ->order(['MusicVideo.id' => 'desc']);

        $meetings = $this->Users->Meetings
            ->find('all')
            ->select([
                'id', 'user_id', 'meeting_date', 'meeting_name', 'time_from', 'time_to', 'organized_by', 'meeting_place',
                'month' => 'DATE_FORMAT(meeting_date,"%b")',
                'day' => 'DATE_FORMAT(meeting_date,"%d")',
                'time_from' => 'DATE_FORMAT(time_from,"%h:%i %p")',
                'time_to' => 'DATE_FORMAT(time_to,"%h:%i %p")'
            ])
            ->where(['user_id' => $id])
            ->order(['Meetings.meeting_date' => 'desc']);

        return [$socials, $music_videos, $meetings];
    }
    public function view($id = null)
    {

        $user = $this->Users->newEmptyEntity();
        $user = $this->Users->get($id, [
            'contain' => ['Meetings', 'MusicVideo', 'SocialMedia', 'UserCards'],
        ]);
        $this->Authorization->authorize($user, 'view');

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

    public function map()
    {

        $this->Authorization->skipAuthorization();
        $user = $this->Users->get($this->Authentication->getIdentity()->getIdentifier(), [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->latitude = $this->request->getData('latitude');
            $user->longitude = $this->request->getData('longitude');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The map details has been saved.'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The map details could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    public function serial($serial_code)
    {
        $this->Authorization->skipAuthorization();

        // dd($this->request->getPath());
        // if (!$serial && $this->request->getPath() == '/') {
        //     // dd($this->Authentication->getIdentity()->getOriginalData()->token);
        //     if ($user = $this->request->getAttribute('identity') == null) {
        //         return $this->redirect('/users/login');
        //     }
        //     $token = $this->Authentication->getIdentity()->getOriginalData()->token;
        // }

        $this->view = 'view';

        $card = $this->Cards->findBySerialCode($serial_code)->first();
        if ($card) {
            $usercards = $this->UserCards->findByCardId($card->id)->first();
            if ($usercards) {
                $user = $this->Users->get($usercards->user_id, ['contain' => 'UserCards']);
                if ($user) {

                    //get data from function $array
                    $data = $this->getUserData($user->id);
                    $socials = $data[0];
                    $music_videos = $data[1];
                    $meetings = $data[2];

                    // $this->set(compact('card', 'user')); 

                    //binding method 
                    $this->request->allowMethod(['get', 'post']);
                    if ($this->request->is(['patch', 'post', 'put'])) {

                        $this->bindusertocard($this->request, $user);
                    }
                    $this->set(compact('user', 'socials', 'meetings', 'music_videos', 'card'));
                    $this->render('/Users/view');
                } else {
                    if ($this->request->getAttribute('identity')) {
                        throw new NotFoundException();
                    }
                    return $this->redirect('/users/login');
                }
            } else {
                throw new NotFoundException();
            }
        } else {
            throw new NotFoundException();
        }

        $this->render('/Users/view');
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
            'contain' => ['Meetings', 'MusicVideo', 'UserCards'],
        ]);

        //get data from function $array
        $data = $this->getUserData($user->id);
        $socials = $data[0];
        $music_videos = $data[1];
        $meetings = $data[2];



        //binding method 
        $this->request->allowMethod(['get', 'post']);
        if ($this->request->is('post') && isset($_POST['extendviavoucher'])) {
            //codes here for extending card via voucher  

            $voucher = $this->Vouchers->findByVoucherCode($this->request->getData('voucher_code'))->first();
            // dd($voucher);
            if ($voucher) {
                if ($voucher->status == 1) {

                    $this->Flash->error(__('Sorry, entered voucher is already in use. Please try again'));
                } else {
                    $vouchertouse = $this->Vouchers->patchEntity($voucher, ['status' => 1]);
                    $voucher = $this->Vouchers->save($vouchertouse);

                    $usercard = $this->UserCards->findByUserId($this->Authentication->getIdentity()->getIdentifier())->where(['UserCards.status' => 1])->first();
                    // dd($usercard->expiration_date->addYear());
                    $userCards = $this->UserCards->patchEntity($usercard, ['expiration_date' => $usercard->expiration_date->addYear()]);
                    $userCards = $this->UserCards->save($userCards);


                    $userVoucher = $this->UserVouchers->newEntity(['user_id' => $this->Authentication->getIdentity()->getIdentifier(), 'voucher_id' => $voucher->id]);
                    $this->UserVouchers->save($userVoucher);

                    $this->Flash->success(__('Voucher is now in use.'));
                    return $this->redirect(['action' => 'token']);
                }
            } else {
                $this->Flash->error(__('Entered voucher is not found. Please try again'));
            }
        } elseif ($this->request->is(['patch', 'post', 'put'])) {
            //this code is for linking card to user or add new card to user  
            $this->bindusertocard($this->request, $userbytoken);
        }

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

    public function generatevcard($id = null)
    {
        $this->Authorization->skipAuthorization();
        if ($id) {
            $findid = $id;
        } else {
            $id = $this->Authentication->getIdentity()->getIdentifier();
        }
        $user = $this->Users->get($id);

        $firstname = $user->firstname;
        $lastname = $user->lastname;
        $fullname = $user->firstname . " " . $user->lastname;
        $bio = $user->user_desc;
        $email = $user->email;
        $company = $user->company;
        $job_title = $user->job_title;
        $business_no = $user->business_no;
        $home_no = $user->home_no;
        $fax_no = $user->fax_no;
        $contactno = $user->contactno; //mobiile no
        $address = $user->address;
        $website = $user->website;

        $filename = $fullname . "-" . date("Y-m-d H:i:s") . ".vcf";

        $generated_text = $this->Users->generate_vcard($fullname, $firstname, $lastname, $company, $job_title, $business_no, $home_no, $fax_no, $contactno, $email, $website, $address);
        //header('Content-Type: text/vcard;charset=utf-8;');
        $this->response->setTypeMap('vcf', ['text/vcard','charset=utf-8']);
        //header('Content-Disposition: attachment; filename="' . $filename);
        $this->response = $this->response->withHeader(
            'Content-Disposition', 'attachment; filename="'.$filename
        );
        echo $generated_text; //required/should be displayed for printing/getting data

        $this->set(compact('generated_text'));
    }
}
