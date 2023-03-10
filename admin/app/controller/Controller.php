<?php
namespace admin\app\controller;

class Controller
{
    protected $rootPathView;
    public function __construct()
    {
        $this->rootPathView = ADMIN_PATH_APP_VIEW;
    }

    protected function getSessionUsername()
    {
        $user = $_SESSION['username'] ?? null;
        return $user;
    }

    protected function loadHeader($header = [])
    {
        return $this->loadView('partials/header_view', $header);
    }

    protected function loadFooter($footer = [])
    {
        return $this->loadView('partials/footer_view', $footer);
    }

    protected function loadView($path, $data = [])
    {
        // load view vao controller hay dau do
        // $path: duong dan den file view
        // $data: du lieu gui ra ngoai view
        extract($data);
        // bien key cua mang thang 1 bien ngoai view
        /*
            ['name' => 'Teo']
            // $name = 'Teo' // su dung ngoai view
        */

        require $this->rootPathView.$path.'.php';

        // require 'app/view/login/form_view.php'
    }

    public function __call($name, $arguments)
    {
        exit("Not found request {$name}");
    }
}