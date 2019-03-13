<?php

    class Users extends Controller {
       
        public function __construct(){
            $this->userModel = $this->model('User');
        }

    
        public function register(){
            
            // Check for Post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process Form

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init Data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                //Validate Email
                if (empty($data['email'])){
                    $data['email_err'] = "Please enter Email";
                }else{
                    //Check Email
                    if ($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = "Email already taken";
                    }
                }

                //Validate Name
                if (empty($data['name'])){
                    $data['name_err'] = "Please enter Name";
                }

                //Validate Password
                if (empty($data['password'])){
                    $data['password_err'] = "Please enter Password";
                }elseif (strlen($data['password']) < 6){
                    $data['password_err'] = "Password must be atleast 6 characters";
                }

                //Validate Confirm Password
                if (empty($data['confirm_password'])){
                    $data['confirm_password_err'] = "Please confirm password";
                }else{
                    if ($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                //Make sure errors are empty
                if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    //Validated

                    //Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register User
                    if($this->userModel->register($data)){
                        redirect('/users/login');
                    }else {
                        die("Something went wrong");
                    }


                } else {
                    $this->view('users/register', $data);
                }

            }else {
                // init Data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                //Load View
                $this->view('users/register', $data);
            }
        }

        public function login(){
   
            // Check for Post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process Form

                //sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email'=> trim($_POST['email']),
                    'password'=> trim($_POST['password']),
                    'email_err'=>'',
                    'password_err'=>'',
                ];

                //Validate Email
                if (empty($data['email'])){
                    $data['email_err'] = "Please enter Email";
                }

                //Validate Password
                if (empty($data['password'])){
                    $data['password_err'] = "Please enter a Password";
                }

                if($this->userModel->findUserByEmail($data['email'])){
                    
                }else {
                    $data['email_err'] = 'No User Found';
                }

                //Make sure errors are empty
                if (empty($data['email_err']) && empty($data['password_err']) ){
                    //check and log in users

                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser){

                    }else {
                        $data['password_err'] = 'Password incorrect';
                        
                        $this->view('users/login', $data);
                    }


                }else {
                    //Load views with errors
                    $this->view('users/login', $data);
                }



            }else {
                // init Data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                //Load View
                $this->view('users/login', $data);
            }
        }
    }
