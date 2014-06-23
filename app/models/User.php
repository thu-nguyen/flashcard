<?php


use Phalcon\Mvc\Model\Validator\Email as Email;

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
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
    public $email;
     
    /**
     *
     * @var string
     */
    public $avatar_file;
     
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
     *
     * @var string
     */
    public $last_login;
     
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
		$this->hasMany("id", "UserFlashcardTerm", "user_id", NULL);
		$this->hasMany("id", "UserFriend", "user_id", NULL);
		$this->hasMany("id", "UserFriend", "user_friend_id", NULL);
		$this->hasMany("id", "UserSocialAccount", "user_id", NULL);
		$this->hasMany("id", "UserSocialFriend", "owner_id", NULL);
		$this->hasMany("id", "UserSocialFriend", "user_id", NULL);

    }


    public function createData($numberOfRows){
        $random = new Random();
        for($i = 1; $i <= $numberOfRows; $i++){
            $user = new User();
            $user->first_name = $random->random_string(5);
            $user->last_name = $random->random_string(5);
            $user->email = $random->random_email();
            $user->avatar_file = "http://facebook.com/" . $random->random_string(5);
            $user->gender = $random->random_gender();
            $user->date_of_birth = $random->random_birth_date();
            $user->date_created = $random->random_created_date();
            $user->save();
        }
        echo "number of Users: " . User::count();

    }


}
