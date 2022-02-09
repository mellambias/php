<?php
/*
 Capitalice names
*/

class ClaseSencilla
{
    // Declaración de una propiedad
    public $var = 'un valor predeterminado';

    // Declaración de un método
    public function mostrarVar() {
        echo $this->var;
    }
}

// Clase con constructor y herencia.

class BaseClass {
   function __construct() {
       print "En el constructor BaseClass\n<br>";
   }
}

class SubClass extends BaseClass {
   function __construct() {
       parent::__construct();
       print "En el constructor SubClass\n<br>";
   }
}

class OtherSubClass extends BaseClass {
    // heredando el constructor BaseClass
}

// En el constructor BaseClass
$obj = new BaseClass();

// En el constructor BaseClass
// En el constructor SubClass
$obj = new SubClass();

// En el constructor BaseClass
$obj = new OtherSubClass();

/*
public accesible desde los objetos y clase usando el operador flecha obj-> propiedad
Private accesible solo para la clase.
protected permite el acceso a las subclases

final hace que un metodo o clase no pueda ser sobre escrita o heredable

static hace que atributos o metodos sean de clase compartidos entre los objetos
se accede usando el operador ::

const define una constante que debe ser accedida usando ::
en los métodos estaticos no existe el $this, usaremos self
*/

/*
 Uso de tipado en los atributos: integer, float, string, CLASE
 para permitir nulos usamos ? : ?float

 public ?float $medida;

 public function contar(string $text):int {

 }
*/
?>