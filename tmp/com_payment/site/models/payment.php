<?php
/**
 * Payment Model for Payment Status Component
 * 
 * @package    com_payment
 * @subpackage Components
 * components/com_hello/views/payment/view.html.php
 * @license    GNU/GPL
 */
 
// No direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );

// import the Joomla modellist library
jimport('joomla.application.component.modellist');


/**
 * Payment status Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class PaymentModelPayment extends JModelList {
    /**
     * Items total
     * @var integer
     */
    var $_total = null;
    /**
     * Pagination object
     * @var object
     */
    var $_pagination = null;
    
    function __construct(){
        parent::__construct();
 
        $mainframe = JFactory::getApplication();
 
        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
 
        // In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
 
        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }    

    function getData() {
        // if data hasn't already been obtained, load it
        if (empty($this->_data)) {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));    
        }
        return $this->_data;
    }
    
    function getTotal(){
        // Load the content if it doesn't already exist
        if (empty($this->_total)) {
            $query = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);       
        }
        return $this->_total;
    }    

    function getPagination(){
        // Load the content if it doesn't already exist
        if (empty($this->_pagination)) {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
        }
        return $this->_pagination;
    }
    
    /**
     * Method to build an SQL query to load the list data.
     *
     * @return      string  An SQL query
     */
    protected function getListQuery()
    {
            // Create a new query object.           
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);
            // Select some fields                  
            $query->select('`studentId` , ri_opleidingen.opleiding, ri_afstudeerrichtingen.afstudeerrichting, `naam` , `voornaam` , `adres` , woonplaats.postcode AS postcode, woonplaats.gemeente AS gemeente, nationaliteit, geslacht, geboortedatum, geboorteplaats.gemeente AS geboorteplaats, medischeBehandeling, medischeToelichting, email, mobiel, rekeningNr, noodNr1, noodNr2');
            $query->from('`ri_deelnemers`');
            $query->join('left', 'ri_gemeenten AS woonplaats ON woonplaats.gemeenteId = ri_deelnemers.woonplaats');
            $query->join('left', 'ri_gemeenten AS geboorteplaats ON geboorteplaats.gemeenteId = ri_deelnemers.geboorteplaats');
            $query->join('left', 'ri_opleidingen ON ( ri_deelnemers.opleiding = ri_opleidingen.opleidingsId )');
            $query->join('left', 'ri_afstudeerrichtingen ON ( ri_deelnemers.afstudeerrichting = ri_afstudeerrichtingen.afstudeerId )');
            $query->join('left', 'ri_bestemming ON ( ri_deelnemers.bestemming = ri_bestemming.bestemmingsId )');
            $query->where('ri_bestemming.bestemming = `Duitsland - Tsjechië`');
            $db->setQuery($query);
            
            return $query;
    }

}