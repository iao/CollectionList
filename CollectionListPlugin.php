<?php 
/**
 *
 * @package  Unity 3D Viewer
 */

class CollectionListPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array ('install', 'uninstall', 'define_acl');
        
    protected $_filters = array('api_resources');

    
    public function hookInstall()
    {
        $db = get_db();
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$db->prefix}collection_lists` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `collection_id` INT UNSIGNED NOT NULL,
            `item_id` INT UNSIGNED NOT NULL,
            PRIMARY KEY  (`id`)
        ) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function hookUninstall()
    {
        // Drop the Imagemap table
        $db = get_db();
        $db->query("DROP TABLE IF EXISTS `{$db->prefix}collection_lists`");
    }

    
    public function hookDefineAcl($args)
    {
        $acl = $args['acl'];
        $acl->addResource('CollectionList_CollectionList');
    }
    
    public function filterApiResources($apiResources)
    {
        $apiResources['collection_list'] = array(
            'record_type' => 'CollectionList',
            'actions' => array('get', 'index', 'post', 'put', 'delete'),
            'index_params' => array('collection_id', 'item_id')
        );
        return $apiResources;
    }
    
}
