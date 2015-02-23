<?php
/**
 * Created by PhpStorm.
 * User: Jan
 * Date: 2015-02-23
 * Time: 11:19
 */

namespace Configs\Admin;


class Admins extends \Base\Config{

    private $minPasswordLength = 8;


    function __construct(){
        $this
            ->newMsg(1,'Activation key not found')
            ->newMsg(2,'Account activated')
            ->newMsg(3,'You are not logged')
            ->newMsg(4,'You have no permissions to edit this data')
            ->newMsg(5,'User not exists')
            ->newMsg(6,'Too many requests. Try to request again after a while')
            ->newMsg(7,'Password reset key not found or is expired. Try to generate new.')
            ->newMsg(8,'User fulfilling the criteria not found.')
            ->newMsg(9,'Password requirements not fulfilled. Password must contains at least 8 characters.')
            ->newMsg(10,'Password reset successful')
            ->newMsg(11,'Password reset process completed')

        ;
    }

    /**
     * @return int
     */
    public function getMinPasswordLength()
    {
        return $this->minPasswordLength;
    }

}