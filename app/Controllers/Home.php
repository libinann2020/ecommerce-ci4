<?php

namespace App\Controllers;
use App\Models\UserDetailModel;
use CodeIgniter\HTTP\IncomingRequest;
use App\Models\User;
class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function register()
    {
        // if ($this->request->getMethod() === 'get') {
        //     return view('register');
        // } else if ($this->request->getMethod() === 'post') {
        //     $validation = $this->validate([
        //                     "username" => "required",
        //                     "email" => "required|valid_email",
        //                     "password"=>"required"
        //                 ]);
        //     if($validation) {
        //         $username=$this->request->getVar('username');
        //         $email=$this->request->getVar('email');
        //         $password=$this->request->getVar('password');
        //         return "form submitted";
        //     } else {
        //         return redirect()->back()->withInput();
        //     }
        // }


        if ($this->request->is('get')) {
            return view('register');
        } else if ($this->request->is('post')) {
            $rules = [
                'username' => 'required|min_length[3]',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[5]|max_length[10]',
                'cpassword'=> 'matches[password]'
            ];
            
            if($this->validate($rules)){
                $formModel = new User();
                $data = [
                    'username' => $this->request->getVar('username'),
                    'email'  => $this->request->getVar('email'),
                    'password'  => $this->request->getVar('password'),
                ];
                $formModel->insert($data);
                // return redirect()->to('/register');
                $session= session();
                $session->set("success_message","User registered successfully");
                $session->markAsFlashdata('success_message');
                return view('register');
            }else{
                return view('register'); 
                // $data['validation'] = $this->validator;
                // echo view('register', $data);
            }  
        }
            
    }

    public function login()
    {
        if ($this->request->is('get')) {
            return view('login');
        } else if($this->request->is('post')) {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required',
            ];
            if($this->validate($rules)){
                $model = new User();
                $record = $model->where('email',$this->request->getVar('email'))
                            ->where('password',$this->request->getVar('password'))
                            ->first();
                $session = session();
                if(!is_null($record)){
                    //data found at database
                    $sess_data = [
                        'user_id'=>$record['id'],
                        'username'=>$record['username'],
                        'email'=>$record['email'],
                        'user_type'=>$record['user_type'],
                        'loginned'=>'loginned'
                    ];
                    $session->set($sess_data);
                    if($record['user_type'] == 'user') {
                        //go to user page
                        $url = "user/user_dashboard";
                    } else if($record['user_type']=='admin') {
                        //go to admin page 
                        $url = "admin/admin_dashboard";
                    }
                return redirect()->to(base_url($url));
                } else {
                    $session->set('failed_message',"Record does not match, try again");
                    $session->markAsFlashdata('failed_message');
                    return view('login');
                }
            } else {
                // return redirect()->to('login');
                return view('login');
            } 
        }
    }

    public function logout()
    {
        $session = session();
        session_unset();
        session_destroy();
        return redirect()->to(base_url());
    }

    public function profile()
    {
        if ($this->request->is('get')) {
            return view('profile');
        } else if ($this->request->is('post')) {
            // $rules = [
            //     'country' => 'if_exist|max_length[120]',
            //     'state' => 'if_exist|max_length[120]',
            //     'district' => 'if_exist|max_length[120]',
            //     'pincode' => 'if_exist|integer|max_length[6]',
            //     'mobile' => 'if_exist|integer|exact_length[10]',
            //     'local_address' => 'if_exist|max_length[255]',
            //     'permanent_address' => 'if_exist|max_length[255]',
            // ];
            // if(!$this->validate($rules)){
            //     return view('profile');
            // }
            $country = $this->request->getVar('country');
            $state = $this->request->getVar('state');
            $district = $this->request->getVar('district');
            $pincode = $this->request->getVar('pincode');
            $mobile = $this->request->getVar('mobile');
            $local_address = $this->request->getVar('local_address');
            $permanent_address = $this->request->getVar('permanent_address');
            $model = new UserDetailModel();
            $session=session();
            $user_id=$session->user_id;
            var_dump($user_id);
            $record=$model->where('user_id',$user_id)->first();
            $data = [
                'country'=>$country,
                'state'=>$state,
                'district'=>$district,
                'pincode'=>$pincode,
                'mobile'=>$mobile,
                'local_address'=>$local_address,
                'permanent_address'=>$permanent_address,
                'user_id'=>$user_id
            ];
            if(!is_null($record)) {
                //update
                $model->update($user_id, $data);
            } else {
                //insert
                $model->insert($data);
            }
            return redirect()->to(base_url('profile'));
        }
    }
    

    // public function sum($x=0,$y=0)
    // {
    //     $z = $x + $y;
    //     return "sum:$z";
    // }
}
