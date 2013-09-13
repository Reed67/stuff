<?php
namespace NewLoginModule\Form;

use Zend\Form\Form;

class NewLoginModuleForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('index');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'login',
            'type' => 'Text',
            'options' => array(
                'label' => 'UserName',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Password',
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $this->add(array(
            'name' => 'rememberme',
            'type' => 'Checkbox',
            'options' => array(
                'label' => 'Remember me?',
            ),
        ));
        $this->add(array(
        'name' => 'sessionid',
        'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

    }

}