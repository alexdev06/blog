<?php
namespace ADABlog\Entity;

use \ADABlog\Fram\Entity;

class User extends Entity
{
    protected $name;
    protected $last_name;
    protected $username;
    protected $email;
    protected $password;
    protected $date_registration;
    protected $member_status;
    protected $administrator_status;

    const PRENOM_INVALIDE = 1;
    const NOM_INVALIDE = 2;
    const NOM_UTILISATEUR_INVALIDE = 3;
    const EMAIL_INVALIDE = 4;
    const PASSWORD_INVALIDE = 5;

    public function isValid()
    {
        return !( empty($this->name)  || empty($this->last_name) || empty($this->username) || empty($this->email) || empty($this->password));
    }

    // SETTERS

    public function setName($name)
    {   
        if (!is_string($name) || empty($name)) {
            $this->erreurs[] = self::PRENOM_INVALIDE;
        }
        $this->name = $name;
    }

    public function setLast_name($lastName)
    {
        if (!is_string($lastName) || empty($lastName)) {
            $this->erreurs[] = self::NOM_INVALIDE;
        }
        $this->last_name = $lastName;
    }

    public function setUsername($userName)
    {
        if (!is_string($userName) || empty($userName)) {
            $this->erreurs[] = self::NOM_UTILISATEUR_INVALIDE;
        }

        $this->username = $userName;
    }

    public function setEmail($email)
    {
        if (!is_string($email) || empty($email)) {
            $this->erreurs[] = self::EMAIL_INVALIDE;
        }

        $this->email = $email;
    }

    public function setPassword($password)
    {
        if (!is_string($password) || empty($password)) {
            $this->erreurs[] = self::PASSWORD_INVALIDE;
        }

        $this->password = $password;
    }

    public function setDate_registration(\DateTime $dateRegistration)
    {
        $this->date_registration = $dateRegistration;
    }

    public function setMember_status($status)
    {
        $this->member_status = $status;
    }

    public function setAdministrator_Status($status)
    {
        $this->administrator_status = $status;
    }


    //GETTERS

    public function name()
    {
        return $this->name;
    }

    public function last_name()
    {
        return $this->last_name;
    }

    public function username()
    {
        return $this->username;
    }

    public function email()
    {
        return $this->email;
    }

    public function password()
    {
        return $this->password;
    }

    public function date_registration()
    {
        return $this->date_registration;
    }

    public function member_status()
    {
        return $this->member_status;
    }
    public function administrator_status()
    {
        return $this->administrator_status;
    }
}