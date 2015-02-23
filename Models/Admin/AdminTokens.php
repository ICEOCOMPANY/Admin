<?php

namespace Models\Admin;

class AdminTokens extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $admin_id;

    /**
     *
     * @var string
     */
    protected $token;

    /**
     *
     * @var string
     */
    protected $expiration_time;

    public function initialize(){

        $this->setSource("admin_tokens");
        $this->belongsTo("admin_id", "Models\Admin\Admins", "id", array("alias" => "admin"));

    }

    /**
     * Method to set the value of field admin_id
     *
     * @param integer $admin_id
     * @return $this
     */
    public function setAdminId($admin_id)
    {
        $this->admin_id = $admin_id;

        return $this;
    }

    /**
     * Method to set the value of field token
     *
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Method to set the value of field expiration_time
     *
     * @param datetime $expiration_time
     * @return $this
     */
    public function setExpirationTime($expiration_time)
    {
        $this->expiration_time = $expiration_time;

        return $this;
    }

    /**
     * Returns the value of field admin_id
     *
     * @return integer
     */
    public function getAdminId()
    {
        return $this->admin_id;
    }

    /**
     * Returns the value of field token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Returns the value of field expiration_time
     *
     * @return string
     */
    public function getExpirationTime()
    {
        return $this->expiration_time;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'admin_id' => 'admin_id', 
            'token' => 'token', 
            'expiration_time' => 'expiration_time'
        );
    }

}
