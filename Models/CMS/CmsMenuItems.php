<?php

namespace Models\CMS;

class CmsMenuItems extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $lang_id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $link;

    /**
     *
     * @var integer
     */
    public $parent;

    /**
     *
     * @var integer
     */
    public $index;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'lang_id' => 'lang_id', 
            'name' => 'name', 
            'link' => 'link', 
            'parent' => 'parent', 
            'index' => 'index'
        );
    }

}
