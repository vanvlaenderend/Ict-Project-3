<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
class TableBestemming extends JTable {
    function __construct( &$db ) {
        parent::__construct('#ip_kamers', 'kamerId', $db);
    }
}