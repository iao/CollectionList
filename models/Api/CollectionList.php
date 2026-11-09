<?php

/**
 * @package Omeka\Record\Api
 */
class Api_CollectionList extends Omeka_Record_Api_AbstractRecordAdapter
{
    
    public function getRepresentation(Omeka_Record_AbstractRecord $record)
    {
        $representation = array();
        $representation['id'] = $record->id;
        $representation['collection_id'] = $record->collection_id;
        $representation['item_id'] = $record->item_id;
        /*$item = $record->getTable('Item')->find($record->item_id);
        $representation['item_title'] = metadata($item, array('Dublin Core', 'Title'), array('no_filter' => true));
        $representation['item_type'] = $item->getItemType()->name;
        $representation['item_url'] = self::getResourceUrl("/items/{$record->item_id}");*/
        return $representation;
    }
    
    public function getResourceId()
    {
        return "CollectionList_CollectionList";
    }
    
    /**
     * Set POST data to a location.
     * 
     * @param Location $record
     * @param mixed $data
     */
    public function setPostData(Omeka_Record_AbstractRecord $record, $data)
    {
        if (isset($data->item->id)) {
            $record->item_id = $data->item->id;
        }
        if (isset($data->collection_id)) {
            $record->collection_id = $data->collection_id;
        }
        if (isset($data->item_id)) {
            $record->item_id = $data->item_id;
        }
    }
    
    /**
     * Set PUT data to a location.
     * 
     * @param Location $record
     * @param mixed $data
     */
    public function setPutData(Omeka_Record_AbstractRecord $record, $data)
    {
        if (isset($data->collection_id)) {
            $record->collection_id = $data->collection_id;
        }
        if (isset($data->item_id)) {
            $record->item_id = $data->item_id;
        }
    }
}
