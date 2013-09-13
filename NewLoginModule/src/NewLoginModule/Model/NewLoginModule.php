<?php
namespace NewLoginModule\Model;


use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class NewLoginModule implements InputFilterAwareInterface
{
    public $login;
    public $password;
    public $sessionid;
    public $number;
    public $score;
    public $tries;
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->login    =  (!empty($data['login'])) ? $data['login'] : null;
        $this->password = (!empty($data['password'])) ? $data['password'] : null;
        $this->sessionid= (!empty($data['sessionid'])) ? $data['sessionid'] : null;
        $this->number= (!empty($data['number'])) ? $data['number'] : null;
        $this->score= (!empty($data['score'])) ? $data['score'] : null;
        $this->tries= (!empty($data['tries'])) ? $data['tries'] : null;
    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    public function getInputFilter()
    {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'login',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 50,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'password',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 50,
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'sessionid',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'number',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                    ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'score',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                    ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'tries',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                    ),
            )));



        return $inputFilter;
    }


}