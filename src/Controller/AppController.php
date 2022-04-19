<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Datasource\ConnectionManager; //for cards mass upload

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public function beforeRender(\Cake\Event\EventInterface $event)
    {
        parent::beforeRender($event);
        $this->set('identity', $this->request->getAttribute('identity'));
        //$result = $this->Authentication->getResult();

        $id = isset($this->request->getAttribute('identity')->id) ? $this->request->getAttribute('identity')->id : ''; //get user id

        $meetingnow = $this->Users->Meetings
            ->find('all')
            ->select([
                'id', 'user_id', 'meeting_date', 'meeting_name', 'time_from', 'time_to', 'organized_by', 'meeting_place',
                'month' => 'DATE_FORMAT(meeting_date,"%b")',
                'day' => 'DATE_FORMAT(meeting_date,"%d")',
                'time_from' => 'DATE_FORMAT(time_from,"%h:%i %p")',
                'time_to' => 'DATE_FORMAT(time_to,"%h:%i %p")'
            ])
            ->where(['user_id' => $id, 'MONTH(meeting_date)' => date('m')]) //diplay all current month only
            ->order(['Meetings.time_from' => 'desc']);
        //->count();

        $countmeetingnow = $this->Users->Meetings
            ->find('all')
            ->where(['user_id' => $id, 'MONTH(meeting_date)' => date('m')]) //diplay all current month only
            ->count(); //count all current month meetings

        $this->set(compact('countmeetingnow', 'meetingnow'));
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        // $this->Authentication->addUnauthenticatedActions(['index', 'view']);
    }
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Common');
        $this->loadComponent('Email');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Authorization.Authorization');
        // $this->Authorization->skipAuthorization();

        $this->connection = ConnectionManager::get('default'); //for cards mass upload

        $this->loadModel('Users');
        $this->loadModel('Meetings');
    }


    public function isAdmin($user)
    {
        // Admin can access every action
        if (isset($user['role']) && $user['role_id'] === 1) {
            return true;
        }

        // Default deny
        return false;
    }
}
