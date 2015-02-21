<?php

namespace Models\CMS;

class CmsStripes extends \Phalcon\Mvc\Model
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
    public $content;

    /**
     *
     * @var string
     */
    public $background;

    /**
     *
     * @var string
     */
    public $expires;

    /**
     *
     * @var integer
     */
    public $active;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'lang_id' => 'lang_id', 
            'content' => 'content', 
            'background' => 'background', 
            'expires' => 'expires', 
            'active' => 'active'
        );
    }

}
