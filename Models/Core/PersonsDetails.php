<?php

namespace Models\Core;

class PersonsDetails extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $user_id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $surname;

    /**
     *
     * @var string
     */
    protected $birthdate;

    /**
     *
     * @var string
     */
    protected $street;

    /**
     *
     * @var integer
     */
    protected $home;

    /**
     *
     * @var integer
     */
    protected $local;

    /**
     *
     * @var string
     */
    protected $postcode;

    /**
     *
     * @var string
     */
    protected $city;

    /**
     *
     * @var integer
     */
    protected $country_id;

    /**
     *
     * @var string
     */
    protected $pesel;

    /**
     *
     * @var string
     */
    protected $phone;

    public function initialize(){

        $this->hasOne("user_id", "Models\Core\Users", "id");
        $this->belongsTo("country_id", "Models\Core\Countries", "id", array("alias" => "country"));

    }

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field surname
     *
     * @param string $surname
     * @return $this
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Method to set the value of field birthdate
     *
     * @param string $birthdate
     * @return $this
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Method to set the value of field street
     *
     * @param string $street
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Method to set the value of field home
     *
     * @param integer $home
     * @return $this
     */
    public function setHome($home)
    {
        $this->home = $home;

        return $this;
    }

    /**
     * Method to set the value of field local
     *
     * @param integer $local
     * @return $this
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Method to set the value of field postcode
     *
     * @param string $postcode
     * @return $this
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Method to set the value of field city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Method to set the value of field country_id
     *
     * @param integer $country_id
     * @return $this
     */
    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;

        return $this;
    }

    /**
     * Method to set the value of field pesel
     *
     * @param string $pesel
     * @return $this
     */
    public function setPesel($pesel)
    {
        $this->pesel = $pesel;

        return $this;
    }

    /**
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Returns the value of field birthdate
     *
     * @return string
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Returns the value of field street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Returns the value of field home
     *
     * @return integer
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Returns the value of field local
     *
     * @return integer
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Returns the value of field postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Returns the value of field city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Returns the value of field country_id
     *
     * @return integer
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * Returns the value of field pesel
     *
     * @return string
     */
    public function getPesel()
    {
        return $this->pesel;
    }

    /**
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'user_id' => 'user_id', 
            'name' => 'name', 
            'surname' => 'surname', 
            'birthdate' => 'birthdate', 
            'street' => 'street', 
            'home' => 'home', 
            'local' => 'local', 
            'postcode' => 'postcode', 
            'city' => 'city', 
            'country_id' => 'country_id', 
            'pesel' => 'pesel', 
            'phone' => 'phone'
        );
    }

}
