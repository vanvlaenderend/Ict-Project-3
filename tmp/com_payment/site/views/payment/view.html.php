<?php
/**
 * @package    com_payment
 * @subpackage Components
 * components/com_hello/views/payment/view.html.php
 * @license    GNU/GPL
*/
 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

/**
 *HTML view class for the Payment status component
 * 
 * @package com_payment
 */

class PaymentViewPayment extends JView{
//    function display($tpl = null) {
//        $model = &$this->getModel();
//        $greeting = $model->getGreeting();
//        $this->assignRef('greeting', $greeting);
//        parent::display($tpl);
    
    function display($tpl = null) {
        // Get data from the model
        $items = $this->get('Items');
        $pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) 
        {
                JError::raiseError(500, implode('<br />', $errors));
                return false;
        }
        // Assign data to the view
        $this->items = $items;
        $this->pagination = $pagination;
 
 
                // Display the template
                parent::display($tpl);
 
        }
}