<?php




class UserFriend extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $user_id;
     
    /**
     *
     * @var integer
     */
    public $user_friend_id;
     
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->belongsTo("user_id", "User", "id", NULL);
		$this->belongsTo("user_friend_id", "User", "id", NULL);

    }

}
