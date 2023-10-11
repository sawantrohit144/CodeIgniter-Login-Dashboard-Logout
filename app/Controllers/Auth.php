<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function login()
    {
        $data = [];
        if ($this->request->getMethod() === 'post') {
            // Validate the user's input here (e.g., username and password).

            $model = new UserModel();
            $user = $model->where('username', $this->request->getVar('username'))
                          ->first();

            if ($user!=null) {
                if ($user['password'] == $this->request->getVar('password')) {
                   return redirect()->to('dashboard');
                 } else {
                   $data['error'] = 'Invalid username or password';
                 }
            } else {
                $data['error'] = 'Invalid username or password';
            }
        }

        return view('auth/login', $data);
    }
    public function logout()
{
    // Perform any necessary logout actions, such as clearing the user session.
    // For example, you can use CodeIgniter's session library to clear the user's session data.
    session()->destroy();

    // Redirect the user to the login page or any other appropriate page.
    return redirect()->to('login');
}

}


 ?>
