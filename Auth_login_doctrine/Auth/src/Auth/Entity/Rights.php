<?php

namespace Auth\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Zend\Form\Annotation; // !!!! Absolutely neccessary
/**
 @ORM\Entity
 * Rights
 *
 * @ORM\Table(name="Rights")
 * @property int $Right_ID
 * @property int $Right_Key
 */





class Rights
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */

    protected $Right_ID;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Right_Key;
	/**
     * @return the $Right_ID
     */
    public function getRight_ID()
    {
        return $this->Right_ID;
    }

	/**
     * @return the $Right_Key
     */
    public function getRight_Key()
    {
        return $this->Right_Key;
    }

	/**
     * @param number $Right_Key
     */
    public function setRight_Key($Right_Key)
    {
        $this->Right_Key = $Right_Key;
    }


}