<?php
defined('_JEXEC') or die;

class frecuenciarespiratoriaControllerupdfrecuenciarespiratoria extends JControllerForm
{
    
    protected function allowAdd($data = array())
    {

        
        $user = JFactory::getUser();
        $categoryId = JArrayHelper::getValue($data, 'catid', $this->input->getInt('filter_category_id'), 'int');
        $allow = null;

        if ($categoryId)
        {
                // If the category has been passed in the URL check it.
                $allow = $user->authorise('core.create', $this->option . '.category.' . $categoryId);
        }

        if ($allow === null)
        {
                // In the absense of better information, revert to the component permissions.
                return parent::allowAdd($data);
        }
        else
        {
                return $allow;
        }
        
    }
    
    protected function allowEdit($data = array(), $key = 'id')
    {

        //Funciones::mostrarZona(__CLASS__,__METHOD__,"allowEdit",1);
        
        $recordId = (int) isset($data[$key]) ? $data[$key] : 0;
        $categoryId = 0;

        if ($recordId)
        {
                $categoryId = (int) $this->getModel()->getItem($recordId)->catid;
        }

        if ($categoryId)
        {

            // The category has been set. Check the category permissions.
            return JFactory::getUser()->authorise('core.edit', $this->option . '.category.' . $categoryId);
            
        } else {
            
            //$data: Array ( [id] => 3 )
            //$key: id
            // Since there is no asset tracking, revert to the component permissions.
            return parent::allowEdit($data, $key);
            
        }
        
    }
    
    public function delete($key = null)
    {
        
        $jinput = JFactory::getApplication()->input;
        $data = $jinput->post->getArray(array());
        $model = $this->getModel('updfrecuenciarespiratoria');
       
        $mensajesDeBorrado = "";
         
        if ($data["jform"]["id"]<>0) {
            $mensajesDeBorrado =  $model->delete($data["jform"]["id"]);
        }
        
        foreach($data["cid"] as $cid) {
            $mensajesDeBorrado = $mensajesDeBorrado  . $model->delete($cid);
        }
        
        $link = 'index.php?option=com_frecuenciarespiratoria&view=historial';
        $this->setRedirect($link, $mensajesDeBorrado);
        
    }
    
    public function add($key = null)
    {
        
        $jinput = JFactory::getApplication()->input;
        $data = $jinput->post->getArray(array());
        $model = $this->getModel('updfrecuenciarespiratoria');
       
        $mensajesDeCreacion = "";
         
        if ($data["resultado"]<>0) {
            $mensajesDeCreacion =  $model->save($data);
        }
        
        $link = 'index.php?option=com_frecuenciarespiratoria&view=historial';
        $this->setRedirect($link, $mensajesDeCreacion);
        
    }

}