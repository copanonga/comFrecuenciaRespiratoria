<?php
defined('_JEXEC') or die;
class Funciones
{
    function mostrarZona($clase,$metodo,$texto,$mostrarVariables){
        
        if (JFactory::getApplication()->input->post->get('DEBUG') == JFactory::getApplication()->input->post->get('ACTIVAR_DEBUG')) {
            echo "------------------------- <br> ";
            echo "Clase: ". $clase ." <br>";
            echo "Método: ". $metodo ." <br>";
            if (!is_array($texto)) {
                echo "Texto: ". $texto ." <br>";
                print_r($texto);
                echo "<br>";
            } else {
                echo "Array: <br>";
                print_r($texto);
                echo "<br>";
            }
            if ($mostrarVariables) {
                echo "------------------------- <br> ";
                echo "GET: variables y valores <br> ";
                $jinput = JFactory::getApplication()->input;
                $data = $jinput->get->getArray(array());
                print_r($data);
                echo "<br>------------------------- <br> ";
            }
            if ($mostrarVariables) {
                echo "------------------------- <br> ";
                echo "POST: variables y valores <br>";
                $jinput = JFactory::getApplication()->input;
                $data = $jinput->post->getArray(array());
                print_r($data);
                echo "<br>------------------------- <br> ";
            }
            echo "-----------XXX-------------- <br> ";
        }
        
    }
    
}