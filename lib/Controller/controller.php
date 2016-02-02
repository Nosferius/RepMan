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
            'editSong'      => ['showSongs', 'editSong'],
            'editComposer'  => ['showComposers', 'editComposer'],
            'showSongs'     => ['showSongs'],
            'showComposers' => ['showComposers'],
            // XXX:Temporary for demonstration:
            'everyThing'    => ['showSongs', 'addSong', 'editSong', 'showComposers', 'addComposer', 'editComposer']
        ];

        // Actions default to themselves unless otherwise specified.
        // fixme: not implemented
        $this->nextActionMap = [
            'something' => 'somethingElse'

        ];
    }

    private function loadView($view)
    {
        $code = file_get_contents("lib/View/" . $view . ".phtml");
        return eval ("?>" . $code);
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

        // Always use last action as action

        $this->vars['action'] = $this->action;

        // Unless overridden by fixme: not implemented

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
            $html .= $this->loadView("showSongs");
        }

        // Always include footer
        $html .= $this->loadView("footer");

        return $html;
    }

    public function showSongs()
    {
        $songs               = new songs();
        $this->vars['songs'] = $songs->fetch();
    }
    public function showComposers()
        //forlateruse
    {
    }

    public function editSong() {
        $songs               = new songs();
        $this->vars['songs'] = $songs->fetch();

        $song               = new songs();
        if  (array_key_exists('id',$_GET)) {
            $this->vars['song'] = $song->fetchByID($_GET['id']);
        }
    }

    public function editComposer() {
        $composer               = new composers();
        if  (array_key_exists('id',$_GET)) {
            $this->vars['composer'] = $composer->fetchByID($_GET['id']);
        }
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

    /**
     * @return array
     */
    public function getActionToViewMap()
    {
        return $this->actionToViewMap;
    }

    /**
     * @param array $actionToViewMap
     */
    public function setActionToViewMap($actionToViewMap)
    {
        $this->actionToViewMap = $actionToViewMap;
    }

}