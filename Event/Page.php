<?php
class Page{
    // path to template
    protected $page;
    // Variable passed in
    protected $vars = array();


    /**
     * Constructor
     * @param $template
     */
    public function __construct($page){
        $this->page = $page;
    }


    /**
     * Get template variable
     * @param $key
     */
    public function __get($key){
        return $this->vars[$key];
    }


    /**
     * Set template variable
     * @param $key
     * @param $value
     */
    public function __set($key, $value){
        $this->vars[$key] = $value;
    }

    public function __toString(){
        extract($this->vars);
        chdir(dirname($this->page));
        ob_start();

        include basename($this->page);

        return ob_get_clean();
    }

}