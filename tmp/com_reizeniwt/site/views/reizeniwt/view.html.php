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
 
/**
 * HTML View class for the Foreign Trip List Component
 */
class ReizenIwtViewReizenIwt extends JView
{
        // Overwriting JView display method
    function display($tpl = null) {
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
