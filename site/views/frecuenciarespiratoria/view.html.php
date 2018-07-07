<?php
defined('_JEXEC') or die;

class frecuenciarespiratoriaViewfrecuenciarespiratoria extends JViewLegacy
{
    
    public function display($tpl = null)
    {

        if (count($errors = $this->get('Errors')))
        {
            JError::raiseError(500, implode("\n", $errors));
            return false;
        }
      
        parent::display($tpl);

    }
      
}