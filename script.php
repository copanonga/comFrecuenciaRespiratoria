<?php
defined('_JEXEC') or die;

class com_frecuenciarespiratoriaInstallerScript
{
    function install($parent)
    {
            $parent->getParent()->setRedirectURL('index.php?option=com_frecuenciarespiratoria');
    }
    function uninstall($parent)
    {
            echo '<p>' . JText::_('COM_FRECUENCIARESPIRATORIA_UNINSTALL_TEXT') . '</p>';
    }
    function update($parent)
    {
            echo '<p>' . JText::_('COM_FRECUENCIARESPIRATORIA_UPDATE_TEXT') . '</p>';
            echo '<p>' . JText::_('COM_FRECUENCIARESPIRATORIA_UPDATE_TEXT') . '</p>';
    }
    function preflight($type, $parent)
    {
            echo '<p>' . JText::_('COM_FRECUENCIARESPIRATORIA_PREFLIGHT_' . $type . '_TEXT') . '</p>';
    }
    function postflight($type, $parent)
    {
            echo '<p>' . JText::_('COM_FRECUENCIARESPIRATORIA_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
    }
}