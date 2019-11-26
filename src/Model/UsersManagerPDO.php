<?php 
namespace ADABlog\Model;

use \ADABlog\Entity\User;

class UsersManagerPDO extends UsersManager
{
    public function add(User $user)
    {
        $sql = 'INSERT INTO user VALUES(NULL, :name, :last_name, :username, :email, :password, NOW(), 0, 0)';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':name' , $user->name());
        $request->bindValue(':last_name', $user->last_name());
        $request->bindValue('username', $user->username());
        $request->bindValue('email', $user->email());
        $request->bindValue('password', $user->password());
        $request->execute();

        $user->setId($this->dao->lastInsertId());
    }

    public function get($login)
    {
        $sql = 'SELECT username, password, date_registration, member_status, administrator_status FROM user WHERE username = :username';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':username',$login);
        $request->execute();
        
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\User');
        $user = $request->fetch();
        
        return $user;
    }

    public function getId($id)
    {
        $sql = 'SELECT id, name, last_name, username, date_registration, member_status, administrator_status FROM user WHERE id = :id';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':id',$id);
        $request->execute();
        
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\User');
        $user = $request->fetch();
        
        return $user;
    }

    public function getList()
    {
        $sql = 'SELECT id, name, last_name, username, email, date_registration, member_status, administrator_status FROM user';
        $request = $this->dao->query($sql);

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\User');
        
        $listUsers = $request->fetchAll();

        foreach ($listUsers as $Users) {
            $Users->setDate_registration(new \DateTime($Users->date_registration()));
        }

        $request->closeCursor();

        return $listUsers;

    }

    public function modifyMemberStatus($id)
    { 
        $user = $this->getId($id);
        $sql = 'UPDATE user SET member_status = :member_status WHERE id = :id';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':id', $user->id());
        if ($user->member_status() == 0) {
            $request->bindValue(':member_status', 1);
        } else {
            $request->bindValue(':member_status', 0);
        }

        $request->execute();
    }

    public function getEmail($email)
    {
        $sql = 'SELECT email FROM user WHERE email = :email';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':email',$email);
        $request->execute();
        
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\User');
        $email = $request->fetch();
        
        return $email;
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM user WHERE id = ' . (int) $id);
    }
}