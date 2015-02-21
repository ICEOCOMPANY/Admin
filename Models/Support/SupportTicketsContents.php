<?php

namespace Models\Support;

class SupportTicketsContents extends \Phalcon\Mvc\Model
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
    public $ticket_id;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var integer
     */
    public $admin_id;

    /**
     *
     * @var string
     */
    public $sender_type;

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
