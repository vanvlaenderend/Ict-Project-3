<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * Hello World Component Controller
 */
class ReizenIwtController extends JController {
    public function display($cachable = false,$urlparams = false){
        //set default view if not set
        JRequest::setVar('view', JRequest::getCmd('view','reizen'));
        //call parent behavior
        parent::display($cachable);
    }
}
