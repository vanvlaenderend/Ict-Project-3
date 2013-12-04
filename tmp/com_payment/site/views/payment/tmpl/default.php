<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_Payment'); ?>" method="post" name="adminForm">
 
//      ITEMS FROM THE DATABASE GO HERE!!!!
 
// PAGINATION GOES HERE
<?php echo $this->pagination->getListFooter(); ?>
</form>