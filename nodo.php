<?php

class Nodo
{

    private $info;
    private $derecho;
    private $izquierdo;
    //private $hijos = array();

    public function __construct($info)
    {
        $this->info = $info;
    }


    public function getInfo()
    {
        
        if (!empty($this->info)) {
            return $this->info;

        }
    }

     public function getDerecho()
    {
        return $this->derecho;
    }

    public function getIzquierdo()
    {
        return $this->izquierdo;
    }


    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function setDerecho($derecho)
    {
        $this->derecho = $derecho;
    }

    public function setIzquierdo($izquierdo)
    {
        $this->izquierdo = $izquierdo;
    }
    

   /* public function getHijos()
    {
        return $this->hijos;
    }

    public function setHijos($hijo, $lado)
    {

        if ($lado == "i") {
            $this->hijos[0] = $hijo;
        } elseif ($lado == "d") {
            $this->hijos[1] = $hijo;
        }
    }*/
}
