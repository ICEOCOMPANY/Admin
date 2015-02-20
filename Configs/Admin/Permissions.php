<?php
/**
 * Created by PhpStorm.
 * User: Jan
 * Date: 2015-02-20
 * Time: 15:21
 */

namespace Configs\Admin;


class Permissions extends \Base\Config{

    //Lista z uprawnieniami adminów
    protected $list = array(
        'MANAGE_USERS' => 1,
    );

    public function get($key){
        return $this->list[$key];
    }

}