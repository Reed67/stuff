<?php
namespace Auth\Controller;

use Doctrine\DBAL\Schema\View;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Auth\Model\LoginFilter;
use Auth\Form\LoginForm;
use Auth\Entity\User;

use Doctrine\ORM\Mapping\OrderBy;
use Doctrine\ORM\EntityManager;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {

        $form = new LoginForm();
        $form->get('submit')->setValue('Einlogen');

        $request = $this->getRequest();
        if ($request->isPost()) {

            $login = new LoginFilter();
            $form->setInputFilter($login->getInputFilter());
            $form->setData($request->getPost());

            $postvar = $this->getRequest()->getPost();
            if($form->isValid()){

                $Em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager'); //funzt

            $login = $Em
                     ->getRepository('Auth\Entity\User')
                     ->findOneBy(array('Login' => $postvar['username']));


                If($login!=null)
                            {
                               If($login->getPassword()===($postvar['password']))
                                   {
                                      $sessionManager = new \Zend\Session\SessionManager();
                                      $time = 1209600;
                                      $sessionManager->rememberMe($time);
                                      $sessionManager->start();
                                      echo 'eingelogt';
                                      return $this->redirect()->toRoute('application');
                                   }
                             }
                         else
                             {
                                     echo 'Login Daten falsch!';
                             }

                     }

        }
        return array('form' => $form);
    }

    public function logoutAction()
    {
            $sessionManager = new \Zend\Session\SessionManager();
            $sessionManager->forgetMe();
            return $this->redirect()->toRoute('auth');
    }

}
