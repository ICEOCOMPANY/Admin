<?php
/**
 * Created by PhpStorm.
 * User: Jan
 * Date: 2015-02-23
 * Time: 09:43
 */

namespace Controllers\Admin;


class Auth extends \Base\Controller
{

    public function init()
    {
        $this->config = new \Configs\Admin\Auth();
    }

    /**
     * POST
     * Tworzenie nowego uzytkownika
     *
     * @return \Helpers\Response
     */
    public function create()
    {

        // Tworze uzytkownika
        $admin = new \Models\Admin\Admins();

        $admin->setActive(1);

        $admin->setPermissions(
            $this->getAdminPermissions()->getDefaultForAdmin()
        );

        // Przypisuje dane do uzytkownika z posta
        $this->setAdminData($admin);

        return $this->response;
    }

    /**
     * Logowanie
     * @return \Helpers\Response
     */
    public function createToken(){

        $login =  $this->request->getPostVar("login");
        $password = $this->request->getPostVar("password");

        $admin = \Models\Admin\Admins::findFirst(array(
            "login = :login:",
            "bind" => array("login" => $login)
        ));

        if($admin){
            $passwordVerify = \password_verify(
                $password,
                $admin->getPassword()
            );

            if($passwordVerify){
                $tokenModel = new \Models\Admin\AdminTokens();

                $tokenModel->setAdminId($admin->getId() );
                $token = \Libs\JWT::encode(
                    array(
                        "login" => $admin->getLogin() ,
                        "ip"=> $this->request->getClientAddress(),
                        "time" => time()
                    ),
                    $this->config->getAppSecretKey()
                );


                $tokenModel->setToken($token);

                $tokenModel->setExpirationTime(
                    (new \DateTime())
                        ->add(new \DateInterval(
                            $this->config->getTokenPermanence()
                        ))
                        ->format(\Helpers\Consts::mysqlDateTimeColumnFormat)
                );


                if($tokenModel->save())
                    $this->response
                        ->setCode(201)
                        ->setJson(array("token"=>$token));


            }else
                $this->response
                    ->setCode(401)
                    ->setJsonErrors(array(
                        $this->config->getMsgByCode(1)
                    ));


        }else
            $this->response
                ->setCode(401)
                ->setJsonErrors(array(
                    $this->config->getMsgByCode(2)
                ));


        return $this->response;
    }

    public function getCurrentAdminId(){
        $token = $this->request->getHeaderMod('Authorization');

        if(!$token)
            return false;

        $response = false;
        $tokenIp = \Libs\JWT::decode(
            $token,
            $this->config->getAppSecretKey()
        );

        if($tokenIp->ip != $this->request->getClientAddress())
            return false;

        $tokenModel = \Models\Admin\AdminTokens::findFirst(array(
            "token = :token:",
            "bind" => array("token" =>  $token)
        ));

        if($tokenModel){

            $now = (new \DateTime())
                ->format(\Helpers\Consts::mysqlDateTimeColumnFormat);

            if(strtotime($tokenModel->getExpirationTime()) < strtotime($now)){
                $tokenModel->delete();
                return false;
            }

            $tokenModel->setExpirationTime(
                (new \DateTime())
                    ->add(new \DateInterval($this->config->getTokenPermanence()))
                    ->format(\Helpers\Consts::mysqlDateTimeColumnFormat)
            );

            $tokenModel->save();

            $response = $tokenModel->getAdminId();
        }

        return $response;
    }

    public function getCurrentAdmin(){
        $currentUser = $this->getDI()->get("admin");

        if($currentUser->getId()){
            $userModel = $currentUser->getModel();

            $this->response->setJson(array(
                "id" => $userModel->getId(),
                "login" => $userModel->getLogin(),
                "active" => ($userModel->getActive()==1)?true:false,
                "permissions" => $currentUser->getPermissions()
            ));

        }else
            $this->response
                ->setCode(401)
                ->setJsonErrors(array(
                    $this->config->getMsgByCode(3)
                ));

        return $this->response;
    }

    //=========== HELPERS ============/

    /**
     * Ustawia dane dla uzytkownika (dla posta i puta)
     *
     * @param $user - obiekt uzytkownia
     * @return int $userId - id usera
     */
    private function setAdminData($admin)
    {
        // Pobieram dane z posta
        foreach ($this->request->getPost() as $key => $value) {
            $setter_name = "set" . ucfirst($key);
            if (method_exists($admin, $setter_name)) {
                $admin->{$setter_name}($this->request->getPostVar($key));
            }
        }

        if (!$admin->save()) {

            // Nie udalo sie zapisac - zwracam blad
            // TODO Konwersja formatu błędów
            $errors = array();
            foreach ($admin->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $this->response
                ->setCode(405)
                ->setJson($errors);

            return false;
        } else {

            // Wszystko poszlo dobrze - zwracam ID
            $this->response
                ->setCode(200)
                ->setJson(array('id' => $admin->getId()));

            return $admin->getId();
        }
    }

}