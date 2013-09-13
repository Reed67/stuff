<?php

namespace Auth\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Zend\Form\Annotation; // !!!! Absolutely neccessary
/**
 @ORM\Entity
 * Groups
 *
 * @ORM\Table(name="Groups")
 * @property int $User_Groups_ID
 * @property int $User_ID
 * @property int $Groups_ID
 * @property int $Temp
 * @property int $Zweig_ID
 */





class Groups
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */

    protected $User_Groups_ID;

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

    protected $Temp;

    /**
    * @var \Application\Entity\Zweig_ID
    * @ORM\Column(name="Zweig_ID" ,type="integer")
    * @ORM\OneToOne(targetEntity="Application\Entity\Zweig_ID")
    * @ORM\JoinColumn(name="Zweig_ID", referencedColumnName="Zweig_ID")
    *
    */

    protected $Zweig_ID;
	/**
     * @return the $User_Groups_ID
     */
    public function getUser_Groups_ID()
    {
        return $this->User_Groups_ID;
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
     * @return the $Temp
     */
    public function getTemp()
    {
        return $this->Temp;
    }

	/**
     * @return the $Zweig_ID
     */
    public function getZweig_ID()
    {
        return $this->Zweig_ID;
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
     * @param number $Temp
     */
    public function setTemp($Temp)
    {
        $this->Temp = $Temp;
    }

	/**
     * @param \Application\Entity\Zweig_ID $Zweig_ID
     */
    public function setZweig_ID($Zweig_ID)
    {
        $this->Zweig_ID = $Zweig_ID;
    }


}