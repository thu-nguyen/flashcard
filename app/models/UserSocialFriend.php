<?php




class UserSocialFriend extends \Phalcon\Mvc\Model
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
    public $owner_id;
     
    /**
     *
     * @var integer
     */
    public $user_id;
     
    /**
     *
     * @var string
     */
    public $first_name;
     
    /**
     *
     * @var string
     */
    public $last_name;
     
    /**
     *
     * @var string
     */
    public $provider;
     
    /**
     *
     * @var string
     */
    public $identity;
     
    /**
     *
     * @var string
     */
    public $gender;
     
    /**
     *
     * @var string
     */
    public $date_of_birth;
     
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
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->belongsTo("owner_id", "User", "id", NULL);
		$this->belongsTo("user_id", "User", "id", NULL);

    }

}
