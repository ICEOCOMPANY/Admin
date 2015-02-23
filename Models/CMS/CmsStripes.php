<?php

namespace Models\CMS;

class CmsStripes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $lang_id;

    /**
     *
     * @var string
     */
    protected $content;

    /**
     *
     * @var string
     */
    protected $background;

    /**
     *
     * @var string
     */
    protected $expires;

    /**
     *
     * @var integer
     */
    protected $active;

    public function initialize(){

        $this->setSource("cms_stripes");
        $this->belongsTo("lang_id", "Models\CMS\Languages", "id", array("alias" => "lang"));

    }

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field lang_id
     *
     * @param integer $lang_id
     * @return $this
     */
    public function setLangId($lang_id)
    {
        $this->lang_id = $lang_id;

        return $this;
    }

    /**
     * Method to set the value of field content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Method to set the value of field background
     *
     * @param string $background
     * @return $this
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Method to set the value of field expires
     *
     * @param string $expires
     * @return $this
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Method to set the value of field active
     *
     * @param integer $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field lang_id
     *
     * @return integer
     */
    public function getLangId()
    {
        return $this->lang_id;
    }

    /**
     * Returns the value of field content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Returns the value of field background
     *
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Returns the value of field expires
     *
     * @return string
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Returns the value of field active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

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
