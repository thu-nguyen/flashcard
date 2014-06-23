<?php


use Phalcon\Mvc\Model\Validator\Email as Email;

class Staff extends \Phalcon\Mvc\Model
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
    public $staff_group_id;
     
    /**
     *
     * @var string
     */
    public $full_name;
     
    /**
     *
     * @var string
     */
    public $email;
     
    /**
     *
     * @var string
     */
    public $password;
     
    /**
     *
     * @var string
     */
    public $date_created;
     
    /**
     *
     * @var string
     */
    public $date_updated;
     
    /**
     * Validations and business logic
     */
    public function validation()
    {

        $this->validate(
            new Email(
                array(
                    "field"    => "email",
                    "required" => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->belongsTo("staff_group_id", "StaffGroup", "id", NULL);

    }

}
