<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;


use Cake\ORM\TableRegistry;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class AppointmentsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        $this->loadModel('Users');
        parent::beforeFilter($event);
        $this->Auth->allow('*');
    }

     public function index()
     {
        if($this->request->session()->read('Auth.User.role')==='doctor') {
            $appointments = $this->Appointments->find('all', ['conditions' => ['Appointments.doctor_id' => $this->request->session()->read('Auth.User.id')]]); 
        }
        else {
            $appointments = $this->Appointments->find('all', ['conditions' => ['Appointments.patient_id' => $this->request->session()->read('Auth.User.id')]]); 
        }
        $this->set('appointments',$this->paginate($appointments));
    }

    public function cancel($id)
    {
        $postData['status'] = '1';
        $postData['id'] = $id;
        $appointment = $this->Appointments->newEntity();
        $appointment = $this->Appointments->patchEntity($appointment, $postData);
        if ($this->Appointments->save($appointment)) {
            $this->Flash->success(__('The appointment cancelled successfully.'));
            return $this->redirect(['action' => 'index']); 
        } 
        $this->Flash->error(__('Unable to cancel the appointment.'));
    }

    public function add()
    {
        $appointment = $this->Appointments->newEntity();
        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $postData['patient_id'] = $this->request->session()->read('Auth.User.id');
            $postData['date'] = $postData['date']['year'].'-'.$postData['date']['month'].'-'.$postData['date']['day'];
            $postData['time'] = $postData['time']['hour'].':'.$postData['time']['minute'].':00';
            $postData['created'] = date('Y-m-d H:i:s');
            $appointment = $this->Appointments->patchEntity($appointment, $postData);
            
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been created.'));
                return $this->redirect(['action' => 'index']);
            }
            
            
            $this->Flash->error(__('Unable to add the appointment.'));
        }
        $doctors = $this->Users->find('list', ['keyField'=>'id','valueField'=>'email',
            'conditions' => ['Users.role' => 'doctor'],
        ]);
        $this->set(compact('doctors','appointment'));
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
