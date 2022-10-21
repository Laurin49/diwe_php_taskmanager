<?php
class Pages extends Controller {
    public function __construct(){

    }

    public function index(){
//        redirect('posts');
//        if(isLoggedIn()){
//        }
        $data = [
            'title' => 'Task-Manager',
            'description' => 'Simple TaskManager App created by DIWE-EDV PHP'
        ];

        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Us',
            'description' => 'App to manager Tasks'
        ];

        $this->view('pages/about', $data);
    }
}
