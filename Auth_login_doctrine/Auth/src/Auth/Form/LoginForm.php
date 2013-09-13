<?php
namespace Auth\Form;
use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct()
    {
        parent::__construct('auth');

        $this->setAttribute('action', '/auth');
        $this->setAttribute('method', 'post');
//         $this->setInputFilter(new \Auth\Form\LoginFilter());

        $this->add(array(
            'name' => 'username',
            'attributes' => array(
            'type' => 'text',
            ),
            'options' => array(
            'label' => 'Benutzername:',
            )
        ));

        $this->add(array(
            'name' => 'password',
            'attributes' => array(
            'type' => 'password',
            ),
            'options' => array(
            'label' => 'Password:'
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
            'type' => 'submit',
            'value' => 'Einloggen'
            ),
            ));


         }
      }
