<?php
namespace ADABlog\Fram;

class PDOFactory
{
    public static function getMysqlConnexion()
    {
        $dtb = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
        $dtb->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $dtb;
    }
}