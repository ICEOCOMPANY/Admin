<?php

namespace Models\Admin;

use Phalcon\Mvc\Model\Validator\Uniqueness as Uniqueness;

class Admins extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $login;

    /**
     *
     * @var string
     */
    protected $password;

    protected $permissions;

    protected $config = false;

    /**
     *
     * @var integer
     */
    protected $active;

    public function initialize(){
        $this->config = new \Configs\Admin\Admins();

        $this->setSource("admins");
        $this->hasMany("id", "Models\Admin\AdminLogs", "admin_id");
        $this->hasMany("id", "Models\Admin\AdminTokens", "admin_id");
        $this->hasMany("id", "Models\Support\SupportTicketsContents", "admin_id");

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
    }

    /**
     * Method to set the value of field login
     *
     * @param string $login
     * @return $this
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        if(strlen($password) <= $this->config->getMinPasswordLength()){
            return NULL;
        } else {
            $this->password = \password_hash($password, PASSWORD_DEFAULT);
            return $this;
        }
    }

    /**
     * @param array $permissions
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * Method to set the value of field active
     *
     * @param integer $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;
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
     * Returns the value of field login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field permissions
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Validations and business logic
     */
    public function validation()
    {
        $this->validate(
            new Uniqueness(
                array(
                    'field' => 'login'
                )
            )
        );

        if ($this->validationHasFailed() == true) {
            return false;
        }
    }


    /**
     * Returns the value of field active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    public function beforeSave(){
        $this->permissions = join(",",$this->permissions);
    }

    public function afterFetch(){
        if($this->permissions == "")
            $this->permissions = array();
        else
            $this->permissions = explode(",",$this->permissions);
    }

    public function checkPermission($key){
        return in_array($key,$this->permissions);
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'login' => 'login', 
            'password' => 'password', 
            'permissions' => 'permissions', 
            'active' => 'active'
        );
    }

}
