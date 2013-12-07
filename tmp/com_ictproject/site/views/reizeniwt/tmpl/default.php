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
<form action="<?php echo JRoute::_('index.php?option=com_reizeniwt'); ?>" method="post" name="adminForm">
    <input type="hidden" name="option" value="<?php echo $option?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="view" value="<?php echo $view?>" />
    <input type="hidden" name="filter_order" value="<?php echo $listOrder?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn?>" />  
    <div id="editcell">
		<table class="adminlist">
                <thead>
                    <tr>
                        <th>
                            <?php echo JHtml::_('grid.sort', 'Student Id', 'studentId', $listDirn, $listOrder); ?>
                        </th>
                        <th>
                            <?php echo JHtml::_('grid.sort', 'Achternaam', 'naam', $listDirn, $listOrder); ?>
                        </th>
                        <th>
                            <?php echo JHtml::_('grid.sort', 'Voornaam', 'voornaam', $listDirn, $listOrder); ?>
                        </th>
                    </tr>
                </thead>
                <tfoot class="pagination">
                <tr>
                    <td colspan="3">
                        <?php echo $this->pagination->getListFooter();?>
                    </td>
                </tr>
            </tfoot>
			<tbody>
<?php
		$k = 0;
		foreach ($this->items as &$row)
		{
?>
				<tr class="row">
					<td><?php echo $row->studentId ?></td>
					<td><?php echo $row->naam ?></td>
					<td><?php echo $row->voornaam ?></td>
				</tr>
<?php
			$k = 1 - $k;
		}
?>
			</tbody>
		</table>
	</div>

</form>