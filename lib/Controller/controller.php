<?php
class controller {
    private $action;
    private $config;
    private $vars;

    public function __construct()
    {

    }

    private function loadView($view)
    {
        $code = file_get_contents("lib/View/".$view.".phtml");
        return eval ($code);
    }

    private function loadVars()
    {
        $composers = new composers();
        $this->vars["composers"] = $composers->fetch();
    }

    public function run()
    {
        $this->loadVars();
        $html = $this->loadView("header");
        $html .= $this->loadView("navigation");
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

    /**
     * @return mixed
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * @param mixed $vars
     */
    public function setVars($vars)
    {
        $this->vars = $vars;
    }


}


?>