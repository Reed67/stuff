<?php
namespace NewLoginModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use NewLoginModule\Model\NewLoginModule;
use NewLoginModule\Form\NewLoginModuleForm;
use Zend\Session\Container;

class NewLoginModuleController extends AbstractActionController
{
    protected $_form;
    protected $_storage;
    protected $_authservice;

    public function getAuthService()
    {
        if (!$this->_authservice) {
            $this->_authservice = $this->getServiceLocator()->get('AuthService');
        }

        return $this->_authservice;
    }

    public function getSessionStorage()
    {
        if (!$this->_storage) {
            $this->_storage = $this->getServiceLocator()->get('LoginAuthStorage');
        }

        return $this->_storage;
    }

    public function getForm()
    {
        if (!$this->_form) {
            $this->_form = new NewLoginModuleForm();
        }

        return $this->_form;
    }

    public function indexAction()
    {
        if ($this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute('success');
        }

        return array('form' => new NewLoginModuleForm(), 'messages' => $this->flashmessenger()->getMessages());
    }

    public function authenticateAction()
    {
        $redirect = 'login';
        $form = $this->getForm();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->getAuthService()
                ->getAdapter()
                ->setIdentity($request->getPost('login'))
                ->setCredential(md5($request->getPost('password')));

            $result = $this->getAuthService()->authenticate();
            if ($result->isValid()) {
                $redirect = 'success';
                if ($request->getPost('rememberme') == 1) {
                    $this->getSessionStorage()->setRememberMe(true);
                    $this->getAuthService()->setStorage($this->getSessionStorage());
                }
                $this->getAuthService()
                    ->getStorage()
                    ->write($request->getPost('login'));
            }else{$redirect='failure';}
        }

        return $this->redirect()->toRoute($redirect);
    }

    public function logoutAction()
    {
        $this->getSessionStorage()->forgetMe();
        $this->getAuthService()->clearIdentity();

        $this->flashmessenger()->addMessage("You've been logged out");
        return $this->redirect()->toRoute('login');
    }

    // public function indexAction()
    // {
    // session_start();
    // if (!isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    // $client_ip = $_SERVER['REMOTE_ADDR'];
    // } else {
    // $client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    // }
    // $user_session = new Container('C' . session_id());
    // if ($user_session->username) {
    // $cUser =
// $this->getLoginModuleTable()->getUser($user_session->offsetGet('username'));
    // $user_session->offsetSet('number', ($cUser->number) ? $cUser->number :
// 0);
    // $user_session->offsetSet('score', ($cUser->score) ? $cUser->score : 0);
    // $user_session->offsetSet('tries', ($cUser->tries) ? $cUser->tries : 0);
    // return new ViewModel(
    // array('message' => 'Welcome ' . $user_session->login . ' ' . $client_ip .
// ' ' . session_id(),
    // 'loggedin' => true, 'number' => $user_session->offsetGet('number'),
    // 'score' => $user_session->offsetGet('score'), 'tries' =>
// $user_session->offsetGet('tries')));
    // } else {
    // return new ViewModel(
    // array(
    // 'message' => 'Welcome ' . $user_session->offsetGet('username') . ' ' .
// $client_ip . ' ' . session_id(),
    // 'loggedin' => false));
    // }
    // }

    // public function newUserAction()
    // {
    // session_start();
    // $form = new LoginModuleForm();
    // $form->get('submit')->setValue('Create User');

    // $request = $this->getRequest();
    // if ($request->isPost()) {
    // $loginModule = new LoginModule();
    // $form->setInputFilter($loginModule->getInputFilter());
    // $form->setData($request->getPost());

    // if ($form->isValid()) {
    // $loginModule->exchangeArray($form->getData());
    // session_regenerate_id(true);
    // $loginModule->sessionid = session_id();
    // $loginModule->number = 0;
    // $loginModule->score = 0;
    // $loginModule->tries = 0;
    // $this->getLoginModuleTable()->saveUser($loginModule);
    // return $this->redirect()->toRoute('index');
    // }
    // }
    // return array('form' => $form);
    // }

    // public function loginAction()
    // {
    // session_start();
    // $form = new LoginModuleForm();
    // $form->get('submit')->setValue('Log In');

    // $request = $this->getRequest();
    // if ($request->isPost()) {
    // $loginModule = new LoginModule();
    // $form->setInputFilter($loginModule->getInputFilter());
    // $form->setData($request->getPost());

    // if ($form->isValid()) {

    // $loginModule->exchangeArray($form->getData());
    // $cUser = $this->getLoginModuleTable()->getUser($loginModule->login);
    // if ($cUser->password == md5($loginModule->password)) {
    // echo "<script>alert('" .
    // print_r($this->getLoginModuleTable()->getUser($loginModule->login), true)
// . "');</script>";
    // session_write_close();
    // session_id($this->getLoginModuleTable()->getUser($loginModule->login)->sessionid);
    // session_start();
    // $user_session = new Container('C' . session_id());
    // $user_session->offsetSet('username', $loginModule->login);
    // $user_session->offsetSet('number', $cUser->number);
    // $user_session->offsetSet('score', $cUser->score);
    // $user_session->offsetSet('tries', $cUser->tries);
    // return $this->redirect()->toRoute('index');
    // }

    // }
    // }
    // return array('form' => $form);
    // }

    // public function logoutAction()
    // {
    // session_start();
    // session_regenerate_id(true);
    // return $this->redirect()->toRoute('index');
    // }

    // public function biggerAction()
    // {
    // session_start();

    // $user_session = new Container('C' . session_id());
    // if ($user_session->offsetGet('username')) {
    // $cUser =
// $this->getLoginModuleTable()->getUser($user_session->offsetGet('username'));
    // }
    // $newnum = rand(1, 100);
    // if ($newnum > $cUser->number) {
    // $tscore = $user_session->offsetGet('score');
    // $tscore++;
    // $user_session->offsetSet('score', $tscore);
    // }
    // $ttries = $user_session->offsetGet('tries');
    // $ttries++;
    // $user_session->offsetSet('tries', $ttries);
    // $user_session->offsetSet('number', $newnum);
    // $data = new LoginModule();
    // $data->login = $user_session->offsetGet('username');
    // $data->number = $user_session->offsetGet('number');
    // $data->score = $user_session->offsetGet('score');
    // $data->tries = $user_session->offsetGet('tries');
    // $this->getLoginModuleTable()->updateUserGame($data);
    // return $this->redirect()->toRoute('index');

    // }

    // public function smallerAction()
    // {
    // session_start();

    // $user_session = new Container('C' . session_id());
    // if ($user_session->username) {
    // $cUser = $this->getLoginModuleTable()->getUser($user_session->username);
    // }
    // $newnum = rand(1, 100);
    // if ($newnum < $cUser->number) {
    // $tscore = $user_session->offsetGet('score');
    // $tscore++;
    // $user_session->offsetSet('score', $tscore);
    // }
    // $ttries = $user_session->offsetGet('tries');
    // $ttries++;
    // $user_session->offsetSet('tries', $ttries);
    // $user_session->offsetSet('number', $newnum);
    // $data = new LoginModule();
    // $data->login = $user_session->offsetGet('username');
    // $data->number = $user_session->offsetGet('number');
    // $data->score = $user_session->offsetGet('score');
    // $data->tries = $user_session->offsetGet('tries');
    // $this->getLoginModuleTable()->updateUserGame($data);
    // return $this->redirect()->toRoute('index');

    // }

}