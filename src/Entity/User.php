<?php
namespace ADABlog\Entity;

use \ADABlog\Fram\Entity;

class User extends Entity
{
    protected $name;
    protected $lastName;
    protected $username;
    protected $email;
    protected $password;
    protected $dateRegistration;
    protected $memberStatus;
    protected $administratorStatus;

    const PRENOM_INVALIDE = 1;
    const NOM_INVALIDE = 2;
    const NOM_UTILISATEUR_INVALIDE = 3;
    const EMAIL_INVALIDE = 4;
    const PASSWORD_INVALIDE = 5;

    public function isValid()
    {
        return !( empty($this->name)  || empty($this->lastName) || empty($this->username) || empty($this->email) || empty($this->password));
    }

    // SETTERS

    public function setName($name)
    {   
        if (!is_string($name) || empty($name)) {
            $this->erreurs[] = self::PRENOM_INVALIDE;
        }
        $this->name = $name;
    }

    public function setLastName($lastName)
    {
        if (!is_string($lastName) || empty($lastName)) {
            $this->erreurs[] = self::NOM_INVALIDE;
        }
        $this->lastName = $lastName;
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

    public function setDateRegistration(\DateTime $dateRegistration)
    {
        $this->dateRegistration = $dateRegistration;
    }

    public function setMemberStatus($status)
    {
        $this->memberStatus = $status;
    }

    public function setAdministratorStatus($status)
    {
        $this->administratorStatus = $status;
    }


    //GETTERS

    public function name()
    {
        return $this->name;
    }

    public function lastName()
    {
        return $this->lastName;
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

    public function dateRegistration()
    {
        return $this->dateRegistration;
    }

    public function memberStatus()
    {
        return $this->memberStatus;
    }
    public function administratorStatus()
    {
        return $this->administratorStatus;
    }
}