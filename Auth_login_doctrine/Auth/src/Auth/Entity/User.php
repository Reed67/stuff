<?php

namespace Auth\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Zend\Form\Annotation; // !!!! Absolutely neccessary
/**
 @ORM\Entity
 * Users
 *
 * @ORM\Table(name="User")
 * @property int $Userid
 * @property string $Login
 * @property string $FirstName
 * @property string $Lastname
 * @property string $Email
 * @property string $Password
 */





class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */

    protected $Userid;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $Login;

    /**
     * @ORM\Column(type="string", nullable=false)
     * @Annotation\Attributes({"type":"password"})
     */

    protected $Password;

    /**
     * @ORM\Column(type="string")
     */

    protected $FirstName;

    /**
     * @ORM\Column(type="string")
     */

    protected $Lastname;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Annotation\Attributes({"type":"Email"})
     */

    protected $Email;

	/**
     * @return the $Userid
     */
    public function getUserid()
    {
        return $this->Userid;
    }

	/**
     * @return the $Login
     */
    public function getLogin()
    {
        return $this->Login;
    }

	/**
     * @return the $FirstName
     */
    public function getName()
    {
        return $this->FirstName;
    }

	/**
     * @return the $Lastname
     */
    public function getLastname()
    {
        return $this->Lastname;
    }

	/**
     * @return the $Email
     */
    public function getEmail()
    {
        return $this->Email;
    }

	/**
     * @return the $Password
     */
    public function getPassword()
    {
        return $this->Password;
    }

	/**
     * @param string $Login
     */
    public function setLogin($Login)
    {
        $this->Login = $Login;
    }

	/**
     * @param string $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

	/**
     * @param string $Lastname
     */
    public function setLastname($Lastname)
    {
        $this->Lastname = $Lastname;
    }

	/**
     * @param string $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

	/**
     * @param string $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }


}