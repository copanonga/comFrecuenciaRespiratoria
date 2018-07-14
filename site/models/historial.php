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
                'nombrepropietario', 'a.nombrepropietario',
                'nombrepaciente', 'a.nombrepaciente',
                'estado', 'a.estado',
                'fecha_creacion', 'a.fecha_creacion'
            );
        }

        parent::__construct($config);
        
    }
    
    protected function populateState($ordering = null, $direction = null)
    {
        
        $search = $this->getUserStateFromRequest($this->context.'.filter.propietario', 'filter_search_propietario');
        $this->setState('filter.propietario', $search);
        
        $search = $this->getUserStateFromRequest($this->context.'.filter.paciente', 'filter_search_paciente');
        $this->setState('filter.paciente', $search);

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
                'a.nombrepropietario, '.
                'a.nombrepaciente, '.
                'a.fecha_creacion'
            )
        );
        $query->from($db->quoteName('#__frecuenciarespiratoria').' AS a');
        
        $search = $this->getState('filter.propietario');
        if (!empty($search))
        {
            if (stripos($search, 'id:') === 0)
            {
                $query->where('a.id = '.(int) substr($search, 3));
            } else {
                
                $search = $db->Quote('%'.$db->escape($search, true).'%');
                $query->where('(a.nombrepropietario COLLATE UTF8_GENERAL_CI LIKE '.$search.')');
            }
        }
        
        $search = $this->getState('filter.paciente');
        if (!empty($search))
        {
            if (stripos($search, 'id:') === 0)
            {
                $query->where('a.id = '.(int) substr($search, 3));
            } else {
                
                $search = $db->Quote('%'.$db->escape($search, true).'%');
                $query->where('(a.nombrepaciente COLLATE UTF8_GENERAL_CI LIKE '.$search.')');
            }
        }

        $orderCol	= $this->state->get('list.ordering');
        $orderDirn	= $this->state->get('list.direction');
        
        $query->order($db->escape($orderCol.' '.$orderDirn));
        
        return $query;
        
    }
    
    
}