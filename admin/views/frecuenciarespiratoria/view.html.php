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
        
        $this->addToolbar();
 
        parent::display($tpl);

    }
    
    protected function addToolbar()
    {

        $bar = JToolBar::getInstance('toolbar');
        JToolbarHelper::title(JText::_('Frecuencia respiratoria'), 'generic.png');
        JToolBarHelper::back(); 
        
    }
        
}