<?php
/**
 * Model to control the destinations of reizeniwt
 * 
 * @package    com_reizeniwt
 * @subpackage Components
 * administrator/components/com_reizeniwt/models/reizen.php
 * @license    GNU/GPL
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modellist');
 
/**
 * Foreign Trip List Model
 */
class ReizenIwtModelReizen extends JModelList{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array('kamerId','bestemmingsId', 'aantal_plaatsen','aantal_beschikbaar');
        }
        parent::__construct($config);
    }
    
    /**
     * Method to build an SQL query to load the list data.
     *
     * @return      string  An SQL query
     */
    function getListQuery()
    {
            // Create a new query object.           
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);
            // Select some fields
            $query->select('kamerId,bestemmingsId,aantal_plaatsen,aantal_beschikbaar');
            $query->from('ip_kamers');
            $query->order($this->getState('list.ordering', 'bestemmingsId') .
            ' ' . $this->getState('list.direction', 'ASC'));
            
            return $query;
    }

}