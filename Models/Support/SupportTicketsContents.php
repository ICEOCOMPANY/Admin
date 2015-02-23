<?php

namespace Models\Support;

class SupportTicketsContents extends \Phalcon\Mvc\Model
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
    protected $ticket_id;

    /**
     *
     * @var string
     */
    protected $content;

    /**
     *
     * @var string
     */
    protected $date;

    /**
     *
     * @var integer
     */
    protected $user_id;

    /**
     *
     * @var integer
     */
    protected $admin_id;

    /**
     *
     * @var string
     */
    protected $sender_type;

    public function initialize(){

        $this->setSource("support_tickets_contents");
        $this->belongsTo("ticket_id", "Models\Support\SupportTickets", "id", array("alias" => "ticket"));
        $this->belongsTo("user_id", "Models\Core\Users", "id", array("alias" => "user"));
        $this->belongsTo("admin_id", "Models\Admin\Admins", "id", array("alias" => "admin"));

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
     * Method to set the value of field ticket_id
     *
     * @param integer $ticket_id
     * @return $this
     */
    public function setTicketId($ticket_id)
    {
        $this->ticket_id = $ticket_id;

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
     * Method to set the value of field date
     *
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field admin_id
     *
     * @param integer $admin_id
     * @return $this
     */
    public function setAdminId($admin_id)
    {
        $this->admin_id = $admin_id;

        return $this;
    }

    /**
     * Method to set the value of field sender_type
     *
     * @param string $sender_type
     * @return $this
     */
    public function setSenderType($sender_type)
    {
        $this->sender_type = $sender_type;

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
     * Returns the value of field ticket_id
     *
     * @return integer
     */
    public function getTicketId()
    {
        return $this->ticket_id;
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
     * Returns the value of field date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field admin_id
     *
     * @return integer
     */
    public function getAdminId()
    {
        return $this->admin_id;
    }

    /**
     * Returns the value of field sender_type
     *
     * @return string
     */
    public function getSenderType()
    {
        return $this->sender_type;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'ticket_id' => 'ticket_id', 
            'content' => 'content', 
            'date' => 'date', 
            'user_id' => 'user_id', 
            'admin_id' => 'admin_id', 
            'sender_type' => 'sender_type'
        );
    }

}
