<?php
include("nodo.php");

class arbolBinario
{
    private $raiz; // root, raiz, padre del arbol.
    public function __construct($raiz)
    {
        $this->raiz = $raiz;
    }

    public function getRaiz()
    {
        return $this->raiz;
    }

    public function setRaiz($raiz)
    {
        $this->raiz = $raiz;
    }

    public function crearArbol($raiz)
    {
        $this->raiz = $raiz;
    }

    // nodo , "D"||"I","String"
    public function agregarNodo($nuevoNodo, $ubicacion, $nodoPadre)
    {

        if (!empty($nodoPadre)) {

            $nodo =  $this->buscar($this->raiz, $nodoPadre);

            if ($ubicacion == "I") {
                // $nodo->setIzquierdo($nuevoNodo);
                $nodo->setHijos($nuevoNodo, 'i');
            } elseif ($ubicacion == "D") {
                //$nodo->setDerecho($nuevoNodo);
                $nodo->setHijos($nuevoNodo, 'd');
            }
            return $nodo;
        } // no se puede agregar nodo sin padre

    }

    public function buscar($nodo, $value)
    {
        echo "nodo info:" . $nodo->getInfo() . "---";
        echo "valor a buscar: " . $value . "<br>";

        if ($nodo == null) {
            return null;
        } elseif ($nodo->getInfo() == $value) {
            return $nodo;
        }
        ## array binario
        echo "buscar valor: " . $value . "<br>";

        $n = $nodo->getHijos();

        if (!empty($n[0])) {
            $izquierda = $this->buscar($n[0], $value);
        }else {
            $izquierda = null;
        }
        if (!empty($n[1])) {
            $derecha = $this->buscar($n[1], $value);
        }else {
            $derecha = null;
        }


        if (!empty($derecha)) {
            return $derecha;
        } else {
            return $izquierda;
        }
    }


    public function verHijos($padre)
    {
        if (!empty($padre)) {
            foreach ($padre->getHijos() as $key => $value) {
                print_r($value); // nodo
                //return $this->verHijos($value);
            }
        }
    }

    public function verArbol($padre)
    {
        if (!empty($padre)) {
            $n = $padre->getHijos();
            echo "<br>padre:" . $padre->getInfo();
            // print_r($n[0]);
            // print_r($n[1]);
            if (!empty($n[0]) && !empty($n[1])) {
                echo "<br>iz: " . $n[0]->getInfo() . "de: " . $n[1]->getInfo();
                foreach ($padre->getHijos() as $key => $value) {

                    return $this->verArbol($value);
                }
            } elseif (!empty($n[0])) {
                echo "<br>iz: " . $n[0]->getInfo();
                foreach ($padre->getHijos() as $key => $value) {

                    return $this->verArbol($value);
                }
            } elseif (!empty($n[1])) {
                echo "<br> de: " . $n[1]->getInfo();
                foreach ($padre->getHijos() as $key => $value) {

                    return $this->verArbol($value);
                }
            }
        }
    }
}
