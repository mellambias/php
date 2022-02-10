<?php

//trait_exists(string $traitname, bool $autoload = ?): bool
/*
Los rasgos («traits» en inglés) son un mecanismo de reutilización de código
 en lenguajes de herencia simple, como PHP. 
 El objetivo de un rasgo es el de reducir las limitaciones propias de la herencia
 simple permitiendo que los desarrolladores reutilicen a voluntad conjuntos de métodos
 sobre varias clases independientes y pertenecientes a clases jerárquicas distintas. 
 La semántica a la hora combinar Traits y clases se define de tal manera que reduzca 
 su complejidad y se eviten los problemas típicos asociados a la herencia múltiple 
 y a los Mixins.

Un Trait es similar a una clase,
pero con el único objetivo de agrupar funcionalidades muy específicas
 y de una manera coherente. 
 No se puede instanciar directamente un Trait. 
 Es por tanto un añadido a la herencia tradicional, 
 y habilita la composición horizontal de comportamientos; 
 es decir, permite combinar miembros de clases sin tener que usar herencia.
*/
trait World {

    private static $instance;
    protected $tmp;

    public static function World()
    {
        self::$instance = new static();
        self::$instance->tmp = get_called_class().' '.__TRAIT__;
       
        return self::$instance;
    }

}

if ( trait_exists( 'World' ) ) {
   
    class Hello {
        use World;

        public function text( $str )
        {
            return $this->tmp.$str;
        }
    }

}

echo Hello::World()->text('!!!'); // Hello World!!!