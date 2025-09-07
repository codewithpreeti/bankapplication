<?php

namespace App\Controllers;

use App\Models\Register_model;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Home extends BaseController
{
    protected $rmodel;
    protected $session;

    public function __construct()
    {
        $this->rmodel = new Register_model();
//        $this->session = service('session');  // there are two ways to use session/initalize the session
        $this->session = session();
        helper('captcha');
    }

    public function index()
    {
//        below line shows how the session is used here
//        $this->session->set('ms', 'www');
//        var_dump($this->session->get('ms'));
//        die;
//        helper('captcha');

//        $data = generate_captcha();
//        echo "<pre>";
//        print_r($data);
//        die;
//        session()->set('captcha_word', $data['word']);

//        return view('myform', ['captcha_image' => $data['image_path']]);


        return view('guideline');
    }

    public function signin()
    {

        $data = generate_captcha();
        session()->set('captcha_word', $data['word']);

        /*        if (!empty($_POST['email'])) {
        //            $db = \Config\Database::connect();
                    $name = htmlentities($_POST['name']);
                    $email = htmlentities($_POST['email']);
                    $pwd = htmlentities($_POST['pwd']);

                    $data = array(
                        'full_name' => $name,
                        'email' => $email,
                        'password' => $pwd,
        //                'created_at'=>date("Y-m-d"),
                    );
        //            echo "<pre>";
        //            print_r($data);
        //            die;
                    $res = $this->rmodel->save_registration($data);


                } else {*/

        return view('signin', ['captcha' => $data['image_path']]);


    }

    public function refresh_captcha()
    {
        $data = generate_captcha();
        session()->set('captcha_word', $data['word']);
        $response = [
            'captcha_path' => $data['image_path'],
            'csrf_token' => csrf_token(),
            'csrf_hash' => csrf_hash(),
        ];
        return json_encode($response);

    }


    public function registration()
    {
//        echo $this->request->getMethod();
//        echo $this->request->getUri();
        // $validation = service('validation');
        if ($this->request->is('post')) {
            //    var_dump($this->request->getPost());
            // $this->request->getPost('full_name');


            $validation = \Config\Services::validation();
            $textfield = [
                'rules'  => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required'   => 'This field is required !',
                    'min_length' => 'This field must be at least 3 characters !',
                    'max_length' => 'This field must not exceed 20 characters !',
                ]
            ];

            $pdfRule = [
                'rules'  => 'uploaded[{field}]|max_size[{field},20]|mime_in[{field},application/pdf]',
                'errors' => [
                    'uploaded' => 'This document is required !',
                    'max_size' => 'File must not exceed 20KB !',
                    'mime_in'  => 'Only PDF files are allowed !',
                ]
            ];

// 'national_proof' => $pdfRule,
//                 'obc_sc'         => $pdfRule,
//                 'discharge_c'    => $pdfRule,
//                 'disability_c'   => $pdfRule,

            if($this->request->getPost('nationality') != 'india')
            {
                $rules['nationality_proof']=[
                    'rules'  => 'uploaded[{field}]|max_size[{field},20]|mime_in[{field},application/pdf]',
                    'errors' => [
                        'uploaded' => 'This document is required !',
                        'max_size' => 'File must not exceed 20KB !',
                        'mime_in'  => 'Only PDF files are allowed !',
                    ]

                ];
            }

            if (($this->request->getPost('category') == 'obc')||(($this->request->getPost('category') == 'sc_st'))) {
                $rules['obc_sc'] = [
                    'rules'  => 'uploaded[{field}]|max_size[{field},20]|mime_in[{field},application/pdf]',
                    'errors' => [
                        'uploaded' => 'This document is required !',
                        'max_size' => 'File must not exceed 20KB !',
                        'mime_in'  => 'Only PDF files are allowed !',
                    ]

                ];
            }elseif($this->request->getPost('category') == 'ex_serv'){
                $rules['discharge_c'] = [
                    'rules'  => 'uploaded[{field}]|max_size[{field},20]|mime_in[{field},application/pdf]',
                    'errors' => [
                        'uploaded' => 'This document is required !',
                        'max_size' => 'File must not exceed 20KB !',
                        'mime_in'  => 'Only PDF files are allowed !',
                    ]

                ];
            }elseif($this->request->getPost('category') == 'pwd'){
                $rules['disability_c'] = [
                    'rules'  => 'uploaded[{field}]|max_size[{field},20]|mime_in[{field},application/pdf]',
                    'errors' => [
                        'uploaded' => 'This document is required !',
                        'max_size' => 'File must not exceed 20KB !',
                        'mime_in'  => 'Only PDF files are allowed !',
                    ]

                ];
            }



            // $jpgRule = [
            //     'rules'  => 'uploaded[{field}]|max_size[{field},20]|mime_in[{field},image/jpeg]|ext_in[{field},jpg,jpeg]',
            //     'errors' => [
            //         'uploaded' => 'This file is required !',
            //         'max_size' => 'File must not exceed 20KB !',
            //         'mime_in'  => 'Only JPG/JPEG files are allowed !',
            //         'ext_in'   => 'Only .jpg or .jpeg extension is allowed!'
            //     ]
            // ];

            $rules = [
                'full_name' => $textfield,
                'father_mother' => $textfield,
                'mobile' => [
                    'rules'  => 'required|numeric|exact_length[10]',
                    'errors' => [
                        'required'     => 'Mobile number is required !',
                        'numeric'      => 'Mobile number must be numeric!',
                        'exact_length' => 'Mobile number must be exactly 10 digits!',
                    ]
                ],
                'email'=>[
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required'    => 'Email is required',
                        'valid_email' => 'Please enter a valid email address',
                    ]
                ],
                'photo' => [
                    'rules' => 'uploaded[photo]|max_size[photo,20]|mime_in[photo,image/jpeg]|ext_in[photo,jpg,jpeg]',
                    'errors' => [
                        'uploaded' => 'This file is required!',
                        'max_size' => 'File must not exceed 20KB!',
                        'mime_in'  => 'Only JPG/JPEG files are allowed!',
                        'ext_in'   => 'Only .jpg or .jpeg extension is allowed!',
                    ]
                ],

                'sign' => [
                    'rules' => 'uploaded[sign]|max_size[sign,20]|mime_in[sign,image/jpeg]|ext_in[sign,jpg,jpeg]',
                    'errors' => [
                        'uploaded' => 'This file is required!',
                        'max_size' => 'File must not exceed 20KB!',
                        'mime_in'  => 'Only JPG/JPEG files are allowed!',
                        'ext_in'   => 'Only .jpg or .jpeg extension is allowed!',
                    ]
                ],

            ];


            // if (! $this->validate($rules)) {
            //     $errors = $this->validator->getErrors();
            //     print_r($errors);
            //     return;
            // }
            if (! $this->validate($rules)) {
               echo "why fails";
                
                // return $this->response->setJSON([
                //     'success' => false,
                //     'errors'  => $validation->getErrors(),
                //     'csrf_token' => csrf_token(),
                //     'csrf_hash' => csrf_hash(),
                // ]);
                // return view('form', ['validation' => $this->validator]);
            }else{
                $data = $this->request->getPost();
                echo "<pre>";
                echo "validation sahi hi";
                print_r($data);
            }
         
        } else {
            return view('form');
        }


    }


    public function login()
    {
//        var_dump($_POST);
        if (!empty($_POST)) {
            $email = htmlentities($_POST['email']);
            $pwd = htmlentities($_POST['pwd']);
            $data = array(
                'email' => $email,
                'pwd' => $pwd
            );

            $regData = $this->rmodel->loginCheckInRegistration($data);
            $formData = $this->rmodel->loginCheckInForm($data);

            // print_r( $regData);
            // echo "<br>WWWW";
            // print_r($formData);
            // die;

            if ((count($regData) > 0) && (count($formData) < 0)) {
                $this->session->set('user_email', $email);
                return view('form');
            } elseif ((count($regData) > 0) && (count($formData) > 0)) {
//                echo "EEEEEE";
//            die;

                $data = [];
                $this->session->set('user_email', $email);
                if (!empty($formData)) {
                    foreach ($formData as $fdata)
                        $data['row'] = $fdata;
                }
//                echo "SSS";
//          echo "<pre>";print_r($data);die;
                return view('filledform', $data);
            }


        }
        return view('login');
    }
}