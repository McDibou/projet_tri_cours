<?php

namespace Adrien\Auth;

use Adrien\App;

class Auth
{
    public function login($pseudo, $password)
    {
        $user = App::getInstance()->getTable('user')->userJoin($pseudo);
        if ($user) {
            if (password_verify($password, $user->password_user)) {
                return $user;
            }
        }
        return false;
    }

    public function verifyRole($role)
    {
        if ($role === 'admin') {
            header("Location: ?p=space.admin");
        } else if ($role === 'user') {
            header("Location: ?p=space.user");
        }
    }

    public function noConnect($name): bool
    {
        if (Session::getInstance()->read('role') !== $name) {
            header("Location: ./");
        } else {
            return true;
        }
    }
}