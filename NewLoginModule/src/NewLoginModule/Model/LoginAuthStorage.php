<?php
namespace NewLoginModule\Model;

use Zend\Authentication\Storage;

class LoginAuthStorage extends Storage\Session
{

    public function setRememberMe($rememberMe = false, $time = 1209600)
    {
        if ($rememberMe) {
            $this->session->getManager()->rememberMe($time);
        }
    }

    public function forgetMe()
    {

        $this->session->getManager()->forgetMe();
    }

}