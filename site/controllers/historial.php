<?php
defined('_JEXEC') or die;

class frecuenciarespiratoriaControllerhistorial extends JControllerAdmin
{
    
    public function getModel($name = 'frecuenciarespiratoria', $prefix = 'historialModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
    
}