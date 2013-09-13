<?php
namespace NewLoginModule\Model;

use Zend\XmlRpc\Value\String;

use Zend\Db\TableGateway\TableGateway;

class NewLoginModuleTable
{
    protected $_tableGateway;
    public function __construct(TableGateway $tableGateway)
    {
        $this->_tableGateway = $tableGateway;
    }
    public function fetchall()
    {
        $resultSet = $this->_tableGateway->select();
        return $resultSet;
    }

    public function getUser($login)
    {
        $UserSet = $this->_tableGateway->select(array('login'=>$login));
        $User=$UserSet->current();
        if(!$User){
            throw new \Exception('Could not find User: '.$login);
        }

        return $User;
    }
    public function saveUser($User)
    {
        $data = array(
            'login'=>$User->login,
            'password'=>md5($User->password),
            'sessionid'=>$User->sessionid,
            'number'=>$User->number,
            'score'=>$User->score,
            'tries'=>$User->tries,
        );
        $UserSet = $this->_tableGateway->select(array('login'=>$User->login));
        $OldUser = $UserSet->current();
        if($OldUser)
        {
            //$this->_tableGateway->update($data,array('login'=>$OldUser->login));
        }else
        {
            $this->_tableGateway->insert($data);
        }
    }
    public function deleteUser($User)
    {
        $UserSet = $this->_tableGateway->select(array('login'=>$User->login,'password'=>$User->password));
        $OldUser = $UserSet->current();
        if($OldUser)
        {
            $this->_tableGateway->delete(array('login'=>$User->login,'password'=>$User->password));
        }
    }
    public function updateUserGame($User)
    {
        $data = array(
        'number'=>$User->number,
        'score'=>$User->score,
        'tries'=>$User->tries,
        );
        $UserSet = $this->_tableGateway->select(array('login'=>$User->login));
        $OldUser = $UserSet->current();
        if($OldUser)
        {
            $this->_tableGateway->update($data,array('login'=>$OldUser->login));
        }

    }
}