<?php

namespace Models\CMS;

class CmsTemplates extends \Phalcon\Mvc\Model
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
    protected $name;

    /**
     *
     * @var integer
     */
    protected $file;

    /**
     *
     * @var integer
     */
    protected $directory_id;

    public function initialize(){

        $this->setSource("cms_templates");
        $this->hasMany("id", "Modesls\CMS\CmsPages", "template_id");
        $this->belongsTo("directory_id", "Models\CMS\CmsTemplatesDirectories", "id", array("alias" => "directory"));

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
     * Method to set the value of field name
     *
     * @param integer $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field file
     *
     * @param integer $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Method to set the value of field directory_id
     *
     * @param integer $directory_id
     * @return $this
     */
    public function setDirectoryId($directory_id)
    {
        $this->directory_id = $directory_id;

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
     * Returns the value of field name
     *
     * @return integer
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field file
     *
     * @return integer
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Returns the value of field directory_id
     *
     * @return integer
     */
    public function getDirectoryId()
    {
        return $this->directory_id;
    }

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
