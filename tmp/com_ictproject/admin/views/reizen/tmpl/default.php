<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
// load tooltip behavior
JHtml::_('behavior.tooltip');
$option = JRequest::getCmd('option');
$view = JRequest::getCmd('view');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
?>
<form action="<?php echo JRoute::_('index.php?option=com_ictproject'); ?>" method="post" name="adminForm" id="adminForm">
    <input type="hidden" name="option" value="<?php echo $option?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="view" value="<?php echo $view?>" />
    <input type="hidden" name="filter_order" value="<?php echo $listOrder?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn?>" />  
    <input type="hidden" name="boxchecked" value="0" />
    <?php echo JHtml::_('form.token'); ?>
    
    <div id="editcell">
	<table class="adminlist">
            <thead>
                <tr>
                    <th style="width: 1%">
                        <input type="checkbox" onclick="Joomla.checkAll(this)" title="<?=JText::_( 'Check All' )?>" value="" name="checkall-toggle">
                    </th>
                    <th>
                        <?php echo JHtml::_('grid.sort', 'Id', 'kamerId', $listDirn, $listOrder); ?>
                    </th>
                    <th>
                        <?php echo JHtml::_('grid.sort', 'BestemmingsId', 'bestemmingsId', $listDirn, $listOrder); ?>
                    </th>
                    <th>
                        <?php echo JHtml::_('grid.sort', 'Aantal plaatsen', 'aantal_plaatsen', $listDirn, $listOrder); ?>
                    </th>
                    <th>
                        <?php echo JHtml::_('grid.sort', 'Aantal beschikbaar', 'aantal_beschikbaar', $listDirn, $listOrder); ?>
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <?php echo $this->pagination->getListFooter();?>
                    </td>
                </tr>
            </tfoot>
            <tbody>
<?php
            $k = 0;
            $i = 0;
            foreach ($this->items as &$row)
            {
                $checked = JHtml::_('grid.id', $i++,$row->kamerId);
                $link = JRoute::_('index.php?option='.$option. '&task=bestemming.edit&id=' . $row->kamerId );
?>
                <tr class="row<?php echo $k ?>">
                    <td><?php echo $checked ?></td>    
                    <td><a href = "/<?php echo $link ?>"><?php echo $row->kamerId ?></td>
                    <td><a href = "/<?php echo $link ?>"><?php echo $row->bestemmingsId ?></td>
                    <td><a href = "/<?php echo $link ?>"><?php echo $row->aantal_plaatsen ?></td>
                    <td><a href = "/<?php echo $link ?>"><?php echo $row->aantal_beschikbaar ?></td>
                </tr>
<?php
                    $k = 1 - $k;
            }
?>
            </tbody>
	</table>
    </div>

</form>