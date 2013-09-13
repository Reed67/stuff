<?php

namespace Auth\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Zend\Form\Annotation; // !!!! Absolutely neccessary
/**
 @ORM\Entity
 * Groups_Name
 *
 * @ORM\Table(name="Groups_Name")
 * @property int $Groups_ID
 * @property string $GroupName
 */





class Groups_Name
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */

    protected $Groups_ID;

    /**
     * @ORM\Column(type="string")
     */
    protected $GroupName;
	/**
     * @return the $Groups_ID
     */
    public function getGroups_ID()
    {
        return $this->Groups_ID;
    }

	/**
     * @return the $GroupName
     */
    public function getGroupName()
    {
        return $this->GroupName;
    }

	/**
     * @param string $GroupName
     */
    public function setGroupName($GroupName)
    {
        $this->GroupName = $GroupName;
    }


}