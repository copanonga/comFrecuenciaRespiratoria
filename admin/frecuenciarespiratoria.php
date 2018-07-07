<?php

defined('_JEXEC') or die;
require_once 'funciones.php';

if (!JFactory::getUser()->authorise('core.manage', 'com_frecuenciarespiratoria'))
{
    return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$jinput = JFactory::getApplication()->input;
$jinput->post->set( 'DEBUG', "SI");
$jinput->post->set( 'ACTIVAR_DEBUG', "SI");
//$jinput->post->set( 'ACTIVAR_DEBUG', "NO");

//$jinput->get->set( 'DEBUGget', "SI");
//$jinput->get->set( 'ACTIVAR_DEBUGget', "SI");

$controller	= JControllerLegacy::getInstance('frecuenciarespiratoria');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();