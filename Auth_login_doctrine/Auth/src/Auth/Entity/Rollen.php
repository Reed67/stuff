<?php

namespace Auth\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Zend\Form\Annotation; // !!!! Absolutely neccessary
/**
 @ORM\Entity
 * Rollen
 *
 * @ORM\Table(name="Rollen")
 * @property int $Rollen_ID
 * @property int $User_ID
 * @property int $Groups_ID
 * @property int $Right_ID
 * @property string $Name
 */





class Rollen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */

    protected $Rollen_ID;

    /**
     * @ORM\Column(type="integer")
     */
    protected $User_ID;

    /**
     * @ORM\Column(type="integer")
     */

    protected $Groups_ID;

    /**
     * @ORM\Column(type="integer")
     */

    protected $Right_ID;

    /**
     * @ORM\Column(type="string")
     */

    protected $Name;
	/**
     * @return the $Rollen_ID
     */
    public function getRollen_ID()
    {
        return $this->Rollen_ID;
    }

	/**
     * @return the $User_ID
     */
    public function getUser_ID()
    {
        return $this->User_ID;
    }

	/**
     * @return the $Groups_ID
     */
    public function getGroups_ID()
    {
        return $this->Groups_ID;
    }

	/**
     * @return the $Right_ID
     */
    public function getRight_ID()
    {
        return $this->Right_ID;
    }

	/**
     * @return the $Name
     */
    public function getName()
    {
        return $this->Name;
    }

	/**
     * @param number $User_ID
     */
    public function setUser_ID($User_ID)
    {
        $this->User_ID = $User_ID;
    }

	/**
     * @param number $Groups_ID
     */
    public function setGroups_ID($Groups_ID)
    {
        $this->Groups_ID = $Groups_ID;
    }

	/**
     * @param number $Right_ID
     */
    public function setRight_ID($Right_ID)
    {
        $this->Right_ID = $Right_ID;
    }

	/**
     * @param string $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }


}