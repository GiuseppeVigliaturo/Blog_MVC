<?php

namespace App\Controllers;

use App\Models\User;
class LoginController extends BaseController
{
    private function generateToken()
    {
        $bytes = random_bytes(32);

        $token = bin2hex($bytes);
        $_SESSION['csrf'] = $token;
        return $token;
    }

    public function showLogin()
    {

        $this->content = view('login', [
            'token' => $this->generateToken(),
            'signup' => 0
        ]);
    }
    public function showSignup()
    {
        $this->content = view('login',
            [
                'token' => $this->generateToken(),
                'signup' => 1
            ]
        );
    }

    public function login()
    {
        $token = $_POST['_csrf'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $result = $this->verifyLogin($email, $password, $token);
        //die(var_dump($result));

        if ($result['success']) {
            
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            unset($result['user']['password']);
            $_SESSION['userData'] = $result['user'];
            redirect('/');
        } else {
            $_SESSION['message'] = $result['message'];
            redirect('/auth/login');
        }
    }

    public function logout()
    {
        $_SESSION = [];
        redirect('/auth/login');
    }

    private function verifyLogin($email, $password, $token)
    {

        $user = new User($this->conn);
        $result = [
            'message' => 'USERD LOGGED IN',
            'success' => true

        ];
        if ($token !== $_SESSION['csrf']) {
            $result = [
                'message' => 'TOKEN MISMATCH',
                'success' => false

            ];
            return $result;
        }
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!$email) {
            $result = [
                'message' => 'WRONG EMAIL',
                'success' => false

            ];
            return $result;
        }
        if (strlen($password) < 6) {
            $result = [
                'message' => 'PASSWORD TOO SMALL',
                'success' => false

            ];
            return $result;
        }
        $resEmail = $user->getUserByEmail($email);
        if (!$resEmail) {
            $result = [
                'message' => 'USER NOT FOUND',
                'success' => false

            ];
            return $result;
        }
        echo password_hash('dedede',PASSWORD_DEFAULT);
        if (!password_verify($password, $resEmail->password)) {
            $result = [
                'message' => 'WRONG PASSWORD',
                'success' => false

            ];
            return $result;
        }
        $result['user'] =(array) $resEmail;
        return $result;
    }
}
