<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');
class ReizenIwtControllerBestemmingen extends JControllerAdmin {
    /**
    * Set default values when no action is specified (ie for cancel)
    */
    public function getModel($name = 'Bestemming', $prefix = 'ReizenIwtModel', 
            $config = array()) {
        return parent::getModel($name, $prefix, $config);
    }
}