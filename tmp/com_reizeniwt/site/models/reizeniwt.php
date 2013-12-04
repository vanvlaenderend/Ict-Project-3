<?php
/**
 * List Model for Foreign Trip List Component
 * 
 * @package    com_reizeniwt
 * @subpackage Components
 * components/com_reizeniwt/views/reizeniwt/view.html.php
 * @license    GNU/GPL
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modellist');
 
/**
 * Foreign Trip List Model
 */
class ReizenIwtModelReizenIwt extends JModelList{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array('studentId', 'naam', 'voornaam');
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
            $query->select('studentId,naam,voornaam');
            $query->from('ri_deelnemers');
            $query->order($this->getState('list.ordering', 'id') .
            ' ' . $this->getState('list.direction', 'ASC'));
//            $query->select('`studentId` , ri_opleidingen.opleiding, ri_afstudeerrichtingen.afstudeerrichting, `naam` , `voornaam` , `adres` , woonplaats.postcode AS postcode, woonplaats.gemeente AS gemeente, nationaliteit, geslacht, geboortedatum, geboorteplaats.gemeente AS geboorteplaats, medischeBehandeling, medischeToelichting, email, mobiel, rekeningNr, noodNr1, noodNr2');
//            $query->from('`ri_deelnemers`');
//            $query->join('left', 'ri_gemeenten AS woonplaats ON woonplaats.gemeenteId = ri_deelnemers.woonplaats');
//            $query->join('left', 'ri_gemeenten AS geboorteplaats ON geboorteplaats.gemeenteId = ri_deelnemers.geboorteplaats');
//            $query->join('left', 'ri_opleidingen ON ( ri_deelnemers.opleiding = ri_opleidingen.opleidingsId )');
//            $query->join('left', 'ri_afstudeerrichtingen ON ( ri_deelnemers.afstudeerrichting = ri_afstudeerrichtingen.afstudeerId )');
//            $query->join('left', 'ri_bestemming ON ( ri_deelnemers.bestemming = ri_bestemming.bestemmingsId )');
//            $query->where('ri_bestemming.bestemming = `China`');
//            $db->setQuery($query);
            
            return $query;
    }

}