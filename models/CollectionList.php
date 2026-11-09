<?php
/**
 * @copyright Roy Rosenzweig Center for History and New Media, 2007-2012
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package ExhibitBuilder
 */
 
/**
 * Exhibit model.
 *
 * @package ExhibitBuilder
 */
class CollectionList extends Omeka_Record_AbstractRecord implements Zend_Acl_Resource_Interface
{
    /**
     * Exhibit title.
     *
     * @var integer
     */
    public $collection_id;

    /**
     * Exhibit title.
     *
     * @var integer
     */
    public $item_id;


    /**
     * Required by Zend_Acl_Resource_Interface.
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'CollectionList_CollectionList';
    }
}
