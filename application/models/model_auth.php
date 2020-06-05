<?php

class Model_Auth extends Model
{

	function signIn($login, $password) {
        if ( ($login === 'admin') && ($password === '123')) {
            setcookie('user', 1, time() + 3600, '/');
            return '1';
        }
        else {
            return '2';
        }
    }

    function exit() {
        setcookie('user', 1, time() - 3600, '/');
    }
}