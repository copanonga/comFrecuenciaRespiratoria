<?php
defined('_JEXEC') or die;

class frecuenciarespiratoriaModelupdfrecuenciarespiratoria extends JModelAdmin
{
    
    protected $text_prefix = 'com_frecuenciarespiratoria';
    
    protected function canDelete($record)
    {
        
        if (!empty($record->id))
        {
            if ($record->state != -2)
            {
                return;
            }
            $user = JFactory::getUser();

            if ($record->catid)
            {
                return $user->authorise('core.delete', 'com_frecuenciarespiratoria.category.'.(int) $record->catid);
            } else {
                return parent::canDelete($record);
            }
        }
    }
    
    protected function canEditState($record)
    {
        $user = JFactory::getUser();

        if (!empty($record->catid))
        {
            return $user->authorise('core.edit.state', 'com_frecuenciarespiratoria.category.'.(int) $record->catid);
        } else {
            return parent::canEditState($record);
        }
        
    }
    
    public function getTable($type = 'updfrecuenciarespiratoria', $prefix = 'frecuenciarespiratoriaTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }
    
    public function getForm($data = array(), $loadData = true)
    {
        
        $app = JFactory::getApplication();
        
        if (empty($form))
        {
            return false;
        }

        return $form;
    }
    
    
    protected function prepareTable($table)
    {
        $table->frecuenciarespiratoria = htmlspecialchars_decode($table->frecuenciarespiratoria, ENT_QUOTES);
    }
    
    public function delete($id)
    {

        if ($id) {
          
            $query = "DELETE FROM #__frecuenciarespiratoria "
                    . "WHERE id=".$id ;
                 
            $bd = JFactory::getDBO();
            $bd->setQuery( $query );
            if (!$bd->execute()) {
                return JText::_('Error: Frecuencia respiratoria no borrada correctamente');
            } else 
                return JText::_('Frecuencia respiratoria borrada correctamente ');
            
        }

    }
    
    public function save($data)
    {
      
        //Fecha del servidor distinta de España
        date_default_timezone_set('Europe/Madrid');
        $fecha_actual = date('Y-m-d H:m:s', time());
        
        if ($data) {
      
            $query = "INSERT INTO #__frecuenciarespiratoria(" .
                    "`resultado`, " .
                    "`nombrepropietario`, " .
                    "`nombrepaciente`, " .
                    "`estado`)  " .
                    "VALUES ( " .
                    "' " . $data["resultado"] . "',".
                    "' " . $data["nombrePropietario"] . "',".
                    "' " . $data["nombrePaciente"] . "',".
                    "'1')";
                    
            $bd = JFactory::getDBO();
            $bd->setQuery( $query );
            if (!$bd->execute()) {
                return JText::_('Error: Frecuencia respiratoria no guardada correctamente');
            } else 
                return JText::_('Frecuencia respiratoria guardada correctamente');
            
        }

    }

}