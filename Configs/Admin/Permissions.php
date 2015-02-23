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
        'USE_CMS' => 2,
        'MANAGE_TICKETS' => 3,
    );

    public function getDefaultForAdmin(){
        return array(
            $this->get("MANAGE_USERS"),
            $this->get("USE_CMS"),
            $this->get("MANAGE_TICKETS"),
        );
    }

    public function get($key){
        return $this->list[$key];
    }

}