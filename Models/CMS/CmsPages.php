<?php

namespace Models\CMS;

class CmsPages extends \Phalcon\Mvc\Model
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
    public $link;

    /**
     *
     * @var integer
     */
    public $template_id;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $keywords;

    /**
     *
     * @var string
     */
    public $content;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'lang_id' => 'lang_id', 
            'link' => 'link', 
            'template_id' => 'template_id', 
            'title' => 'title', 
            'description' => 'description', 
            'keywords' => 'keywords', 
            'content' => 'content'
        );
    }

}
