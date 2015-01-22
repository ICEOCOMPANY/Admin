<?php
/**
 * Created by PhpStorm.
 * User: dawid
 * Date: 22.01.15
 * Time: 13:15
 */


namespace Controllers\Core;

use \Phalcon\Db\Column;

class Auth extends \Phalcon\Mvc\Controller{


    public function post(){

        echo "test";

        $response = new \Helpers\RestResponse();

        $parameters = array(
            "email" => $this->request->getPost("email")
        );

        $user = \Models\Core\Users::findFirst(array(
            "email = :email:",
            "bind" => $parameters
        ));


        if($user){
            $passwordVerify = \password_verify(
                $this->request->getPost("password"),
                $user->getPassword()
            );

            if($passwordVerify){
                $tokenModel = new \Models\Core\Tokens();
                $tokenModel->setUserId( $user->getId() );
                $tokenModel->setToken("chujowy token");

                if($tokenModel->save()){

                    $response->setStatusCode("201","Token created");
                    $response->setJson(array("id"=>$user->getId()));

                }




            }else{
                $response->setStatusCode("401","Unauthorized");
                $response->setJsonErrors(array("password is invalid"));
            }

        }else{
            $response->setStatusCode("401","Unauthorized");
            $response->setJsonErrors(array("not found user with this email"));
        }

        return $response;
    }


} 