<?php
/**
 * Created by PhpStorm.
 * User: Jan
 * Date: 2015-02-23
 * Time: 10:30
 */

namespace Configs\Admin;


class Auth extends \Base\Config
{

    private $appSecretKey = "sFHePANXTQfhYprW7q2agtotD5YPNh"; // secret key which will encrypt/decrypt tokens
    private $tokenPermanence = "PT60M";                       // token permanence (DateInterval)

    function __construct()
    {
        $this
            ->newMsg(1, "Password is invalid")
            ->newMsg(2, "Not found user with this email")
            ->newMsg(3, "You are not logged")
            ->newMsg(4, "Token not given")
            ->newMsg(5, "Token incorrect")
            ->newMsg(6, "Logout Successful");
    }

    /**
     * @return string
     */
    public function getAppSecretKey()
    {
        return $this->appSecretKey;
    }

    /**
     * @return int
     */
    public function getMinPasswordLength()
    {
        return $this->minPasswordLength;
    }

    /**
     * @return string
     */
    public function getResetKeyPermanence()
    {
        return $this->resetKeyPermanence;
    }

    /**
     * @return string
     */
    public function getTokenPermanence()
    {
        return $this->tokenPermanence;
    }

}