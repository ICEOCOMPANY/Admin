<?php

namespace Models\CMS;

class CmsTemplates extends \Phalcon\Mvc\Model
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
    public $name;

    /**
     *
     * @var integer
     */
    public $file;

    /**
     *
     * @var integer
     */
    public $directory_id;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'name' => 'name', 
            'file' => 'file', 
            'directory_id' => 'directory_id'
        );
    }

}
