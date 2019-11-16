<?php
namespace ADABlog\Fram;

session_start();

class Visitor
{
  public function getAttribute($attr)
  {
    return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
  }

  public function getFlash()
  {
	$flash = $_SESSION['flash'];
  unset($_SESSION['flash']);

    return $flash;
  }

  public function hasFlash()
  {
    return isset($_SESSION['flash']);
  }

  public function isAuthenticated()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }

  public function setAttribute($attr, $value)
  {
    $_SESSION[$attr] = $value;
  }

  public function setAuthenticated($authenticated = true)
  {
    if (!is_bool($authenticated)) {
      throw new \InvalidArgumentException('La valeur spécifiée à la méthode Visitor::setAuthenticated() doit être un boolean');
      }

    $_SESSION['auth'] = $authenticated;
  }

  public function setAdministrator($administrator = true)
  {
    if (!is_bool($administrator)) {
    throw new \InvalidArgumentException('La valeur spécifiée à la méthode Visitor::setAdministrator() doit être un boolean');
    }

    $_SESSION['adm'] = $administrator;
  }

  public function isAdministrator()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true && isset($_SESSION['adm']) && $_SESSION['adm'] === true;
  }

  public function setFlash($value)
  {
    $_SESSION['flash'] = $value;
  }
}