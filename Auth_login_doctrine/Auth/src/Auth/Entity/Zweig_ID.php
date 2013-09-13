<?php

namespace Auth\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Zend\Form\Annotation; // !!!! Absolutely neccessary
/**
 @ORM\Entity
 * Zweig_ID
 *
 * @ORM\Table(name="Zweig_ID")
 * @property int $Zweig_ID
 * @property string $ZweigName
 * @property int $ParrentZweig
 */





class Zweig_ID
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="Zweig_ID", type="integer")
     */

    protected $Zweig_ID;

    /**
     * @ORM\Column(type="string")
     */
    protected $ZweigName;

    /**
     * @ORM\Column(type="integer")
     */
    protected $ParrentZweig;
	/**
     * @return the $Zweig_ID
     */
    public function getZweig_ID()
    {
        return $this->Zweig_ID;
    }

	/**
     * @return the $ZweigName
     */
    public function getZweigName()
    {
        return $this->ZweigName;
    }

	/**
     * @return the $ParrentZweig
     */
    public function getParrentZweig()
    {
        return $this->ParrentZweig;
    }

	/**
     * @param string $ZweigName
     */
    public function setZweigName($ZweigName)
    {
        $this->ZweigName = $ZweigName;
    }

	/**
     * @param number $ParrentZweig
     */
    public function setParrentZweig($ParrentZweig)
    {
        $this->ParrentZweig = $ParrentZweig;
    }


}