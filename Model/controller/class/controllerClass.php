<?php

namespace Model\ModelClass;

class Controller
{
    public $element;
    public $request;

    public function __construct($request, $element) {
        $this->request = $request;
        $this->element = $element;
    }

    /**
     * Get the value of element
     */ 
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Set the value of element
     *
     * @return  self
     */ 
    public function setElement($element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * Get the value of request
     */ 
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set the value of request
     *
     * @return  self
     */ 
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }
}