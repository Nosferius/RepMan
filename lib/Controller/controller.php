<?php


/**
 * Class controller
 *
 * This is the controller. It should have controllers per function, but we don't need those yet.
 *
 * @copyright Nosferius
 */

class controller
{
    /**
     * @var string Action we are controlling
     */
    private $action;

    /**
     * @var array fixme: Currently unused
     */
    private $config;

    /**
     * @var array
     */
    private $vars;

    /**
     * @var array
     */
    private $actionToViewMap;

    public function __construct()
    {
        // Define type of the variables in the class
        // not required, but very nice
        $this->action   = "";
        $this->vars     = [];
        $this->config   = [];;

        // Which views should be displayed after which action
        $this->actionToViewMap = [
            'addSong'       => ['addSong'],
            'addComposer'   => ['addComposer'],
            'showSongs'     => ['showSongs'],
            // XXX:Temporary for demonstration:
            'everyThing'    => ['addSong', 'addComposer', 'showSongs', 'addSong'],
        ];
    }

    private function loadView($view)
    {
        $code = file_get_contents("lib/View/" . $view . ".phtml");
        return eval ($code);
    }

    private function loadVars()
    {
        $composers               = new composers();
        $this->vars["composers"] = $composers->fetch();
    }

    public function run()
    {
        $this->loadVars();

        // Perform controller action if exists

        // fixme: This is a security problem, methods can be executed from the url
        // fixme: build hashmap
        // fixme: actually, do it like the views with a actionControllerActionMap
        if(method_exists($this,$this->action)){
            $this->{$this->action}();
        };

        // Always include header and navigation
        $html  = $this->loadView("header");
        $html .= $this->loadView("navigation");

        if ($this->action != "") {
            // Include all views required for this action as defined in the actionToViewMap
            foreach($this->actionToViewMap[$this->action] as $action){
                $html .= $this->loadView($action);
            }
        }
        // Set default opening page in elseif if no action is given
        elseif ($this->action =! "") {
            $html .= $this->loadView("placeholder");
        }

        // Always include footer
        $html .= $this->loadView("footer");

        return $html;
    }

    public function showAllSongs()
    {
        $songs               = new songs();
        $this->vars['songs'] = $songs->fetch();
    }

    // future controller functions
    // findSong
    // modifySong
    // deleteSong
    // showAllComposers
    // etc etc etc

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