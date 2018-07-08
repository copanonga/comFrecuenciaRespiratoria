<?php
defined('_JEXEC') or die;

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
    
?>

<div class="header">

    <h1><span class="site-title" title="Frecuencia respiratoria"><a href="frecuencia-respiratoria">Frecuencia respiratoria</a></span></h1>
    <h2><span class="site-title" title="Historial"><legend>Historial</legend></span></h2>

</div>

<form action="<?php echo JRoute::_('index.php?option=com_frecuenciarespiratoria&view=historial'); ?>" method="post" name="adminForm" id="adminForm">

    <div class="btn-toolbar">
            
        <div class="btn-group pull-left">
            <button type="button" class="btn" onclick="
                if (document.adminForm.boxchecked.value == 0) { 
                    alert('<?php echo JText::_('Debes seleccionar al menos un elemento') ?>'); } 
                else {
                    if (confirm('<?php echo JText::_('¿Seguro que quieres borrarlo?') ?>')) { 
                        Joomla.submitbutton('updfrecuenciarespiratoria.delete'); 
                    }
                }"
            class="btn btn-small">
            <span class="icon-delete" aria-hidden="true"></span>
            <?php echo JText::_('JACTION_DELETE') ?>
            </button>
        </div>
        
    </div>
        
    <div class="btn-group pull-right">
        <label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
        <?php echo $this->pagination->getLimitBox(); ?>
    </div>
    
    <div id="j-main-container">
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="1%">
                        <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
                    </th>
                    <th width="5%" class="center nowrap hidden-phone">
                        <?php echo JHtml::_('grid.sort', "ID", 'a.id', $listDirn, $listOrder); ?>
                    </th>
                    <th width="44%" class="title">
                        <?php echo JHtml::_('grid.sort', "Resultado", 'a.resultado', $listDirn, $listOrder); ?>
                    </th>
                    <th width="50%" class="center title">
                        <?php echo JHtml::_('grid.sort', "Fecha", 'a.fecha_creacion', $listDirn, $listOrder); ?>
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="10">
                        <?php echo $this->pagination->getListFooter(); ?>
                    </td>
                </tr>
            </tfoot>

            <tbody>
                <?php foreach ($this->items as $i => $item) : ?>
                    <tr class="row<?php echo $i % 2; ?>" sortable-group-id="1">
                        <td class="center">
                            <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                        </td>
                        <td class="center hidden-phone">
                            <?php echo $item->id; ?>
                        </td>
                        <td class="left">
                            <?php echo $item->resultado; ?>
                        </td>
                        <td class="nowrap center has-context">
                            <?php echo $item->fecha_creacion; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
        <?php echo JHtml::_('form.token'); ?>

    </div>
    
</form>