<?php
/**
 * Created by PhpStorm.
 * User: Jan
 * Date: 2015-02-20
 * Time: 15:13
 */

namespace Controllers\Admin;


class Users extends \Base\Controller
{

    /**
     * GET
     * Pobieranie szczegołowych danych o użytkowniku
     *
     * @return \Helpers\Response
     */
    public function detailsAction()
    {

        $users = \Models\Core\Users::find();

        $usersData = [];


        foreach ($users as $user) {
            //Jeżeli user ma rekord w tabeli ze szczegółowymi danymi
            $details = $user->details;

            if ($details) {
                array_push($usersData, $this->getUsersData($details));
            }
        }

        $this->response->setCode(200)->setJson(array("data", $usersData));
        return $this->response;

    }

    //========== HELPERS ==========//

    private function getUsersData($details){

        return array(
            "name" => $details->getName(),
            "surname" => $details->getSurname(),
            "birthdate" => $details->getBirthdate(),
            "street" => $details->getStreet(),
            "home" => $details->getHome(),
            "local" => $details->getLocal(),
            "postcode" => $details->getPostcode(),
            "city" => $details->getCity(),
            "country" => ($details->country) ? $details->country->getShortcut() : null,
            "pesel" => $details->getPesel(),
            "phone" => $details->getPhone()
        );

    }

}