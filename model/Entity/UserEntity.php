<?php

namespace Adrien\Entity;

class UserEntity extends Entity
{

    public function __construct(array $datas)
    {
        parent::__construct($datas);
    }

    public function getNameUser()
    {
        return $this->data['name_user'];
    }

    public function getUsernameUser()
    {
        return $this->data['username_user'];
    }

    public function getMailUser()
    {
        return $this->data['mail_user'];
    }

    public function getPseudoUser()
    {
        return $this->data['pseudo_user'];
    }

    public function getPasswordUser()
    {
        return $this->data['password_user'];
    }

    public function getKeyUser()
    {
        return $this->data['key_user'];
    }

    public function getActiveUser()
    {
        return $this->data['active_user'];
    }

    public function getRoleId()
    {
        return $this->data['role_id'];
    }

    public function setNameUser($name_user)
    {
        $name_user = $this->analyseData($name_user, "/^[a-zA-Z0-9' -]*$/");
        if (empty($name_user)) {
            $this->error['name_user'] = 'le nom n\'est pas valide';
        } elseif (strlen($name_user) > 80) {
            $this->error['name_user'] = 'le nom est trop long';
        } else {
            $this->data['name_user'] = $name_user;
        }
    }

    public function setUsernameUser($username_user)
    {
        $username_user = $this->analyseData($username_user, "/^[a-zA-Z0-9' -]*$/");
        if (empty($username_user)) {
            $this->error['username_user'] = 'le prenom n\'est pas valide';
        } elseif (strlen($username_user) > 80) {
            $this->error['username_user'] = 'le prenom est trop long';
        } else {
            $this->data['username_user'] = $username_user;
        }
    }

    public function setMailUser($mail_user)
    {
        if (!filter_var($mail_user, FILTER_VALIDATE_EMAIL)) {
            $this->error['mail_user'] = 'l\'email n\'est pas valide';
        } elseif (strlen($mail_user) > 255) {
            $this->error['mail_user'] = 'l\'email est trop long';
        } else {
            $this->data['mail_user'] = $mail_user;
        }
    }

    public function setPseudoUser($pseudo_user)
    {
        $pseudo_user = $this->analyseData($pseudo_user, "/^[a-zA-Z0-9'-]*$/");
        if (empty($pseudo_user)) {
            $this->error['pseudo_user'] = 'le pseudo n\'est pas valide';
        } elseif (strlen($pseudo_user) > 60) {
            $this->error['pseudo_user'] = 'le pseudo est trop long';
        } else {
            $this->data['pseudo_user'] = $pseudo_user;
        }
    }

    public function setPasswordUser1($password_user)
    {
        $password_user = $this->analyseData($password_user, "/^[a-zA-Z0-9]*$/");
        if (empty($password_user)) {
            $this->error['password_user1'] = 'le mot de passe n\'est pas valide';
            $this->data['password_user1'] = $password_user;
        } else {
            $this->data['password_user1'] = $password_user;
        }
    }

    public function setPasswordUser2($password_user)
    {
        $password_user = $this->analyseData($password_user, "/^[a-zA-Z0-9]*$/");
        if (empty($password_user)) {
            $this->error['password_user2'] = 'le mot de passe n\'est pas valide';
        } elseif ($this->data['password_user1'] !== $password_user) {
            $this->error['password_user2'] = 'les mots de passe ne sont pas identique';
        } else {
            $this->data['password_user'] = password_hash($password_user, PASSWORD_DEFAULT);
            unset($this->data['password_user1'], $this->data['password_user2']);
        }
    }

    public function setPasswordUser($password_user)
    {
        $password_user = $this->analyseData($password_user, "/^[a-zA-Z0-9]*$/");
        if (empty($password_user)) {
            $this->error['password_user'] = 'le mot de passe n\'est pas valide';
        } else {
            $this->data['password_user'] = $password_user;
        }
    }

    public function setKeyUser($key_user)
    {
        $this->data['key_user'] = $key_user;
    }

    public function setActiveUser($active_user)
    {
        if (!ctype_digit($active_user)) {
            $this->error['active_user'] = 'Une erreur c\'est produite';
        } else {
            $this->data['active_user'] = $active_user;
        }
    }

    public function setRoleId($role_id)
    {
        if (!ctype_digit($role_id) && $role_id === '2') {
            $this->error['role_id'] = 'Une erreur c\'est produite';
        } else {
            $this->data['role_id'] = $role_id;
        }
    }
}