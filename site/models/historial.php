<?php
defined('_JEXEC') or die;

class frecuenciarespiratoriaModelhistorial extends JModelList
{
    
    public function __construct($config = array())
    {
            
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'resultado', 'a.resultado',
                'estado', 'a.estado',
                'fecha_creacion', 'a.fecha_creacion'
            );
        }

        parent::__construct($config);
        
    }
    
    protected function populateState($ordering = null, $direction = null)
    {

        $state = $this->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
        $this->setState('filter.state', $state);
        
        parent::populateState('a.id', 'desc');
        
    }

    protected function getListQuery()
    {
        
        $db = $this->getDbo();
        $query	= $db->getQuery(true);
                
        $query->select(
            $this->getState(
                'list.select',
                'a.id, '.
                'a.resultado, '.
                'a.estado, '.
                'a.fecha_creacion'
            )
        );
        $query->from($db->quoteName('#__frecuenciarespiratoria').' AS a');

        $orderCol	= $this->state->get('list.ordering');
        $orderDirn	= $this->state->get('list.direction');
        
        $query->order($db->escape($orderCol.' '.$orderDirn));
        
        return $query;
        
    }
    
    
}