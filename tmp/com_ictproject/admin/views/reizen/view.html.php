<?php
/**
 * @package    com_reizeniwt
 * @subpackage Components
 * components/com_reizeniwt/views/reizeniwt/view.html.php
 * @license    GNU/GPL
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
jimport('joomla.html.pagination'); 
/**
 * HTML View class for the Foreign Trip List Component
 */
class ReizenIwtViewReizen extends JView
{
        // Overwriting JView display method
    function display($tpl = null) {
        JHtml::_('behavior.framework');
        // Toolbar
        JToolBarHelper::title(JText::_('BESTEMMINGEN'),'generic.png');
        JToolBarHelper::addNewX('reizen.add');
        JToolBarHelper::editListX('reizen.edit');
        JToolBarHelper::deleteList(JText::_('BESTEMMINGEN_CONFIRM_DELETE'),'reizen.delete');
        
        // Get data from the model
        $this->items = $this->get('Items');
        $pagination = $this->get('Pagination');
        $this->state = $this->get('State');
        // Check for errors.
        if (count($errors = $this->get('Errors'))) 
        {
                JError::raiseError(500, implode('<br />', $errors));
                return false;
        }
        
        // Assign data to the view
        $this->pagination = $pagination;
  
        // Display the template
        parent::display($tpl);
 
        }
}
