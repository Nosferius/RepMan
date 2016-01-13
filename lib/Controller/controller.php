<?php
class controller {
    private $action;
    private $config;

    public function __construct()
    {

    }

    private function loadView($view)
    {
        $code = file_get_contents("lib/View/".$view.".phtml");
        return eval ($code);
    }

    public function run()
    {
        $html = $this->loadView("header");
        $html = $this->loadView("navigation");
        if($this->action != "") {
            $html .= $this->loadView($this->action);
        }
        $html .= $this->loadView("footer");
        return $html;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }



}


?>