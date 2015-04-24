<?php
// we use this class as an interface to transform a template into object
// and assign values to variables in the template
// then return it as string to client

class Page{
    protected $page;

    protected $vars = array();

    public function __construct($page){
        $this->page = $page;
    }

    public function __get($key){
        return $this->vars[$key];
    }

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