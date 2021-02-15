<?php

namespace Adrien\Auth;

class Session
{
    static $instance;

    static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function __construct()
    {
        session_start();
    }

    public function destroy()
    {
        session_destroy();
    }

    public function write($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    public function read($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function verify($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function delete($key)
    {
        unset($_SESSION[$key]);
    }
}
