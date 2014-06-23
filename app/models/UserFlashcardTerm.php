<?php




class UserFlashcardTerm extends \Phalcon\Mvc\Model
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
    public $flashcard_term_id;
     
    /**
     *
     * @var string
     */
    public $game_code;
     
    /**
     *
     * @var string
     */
    public $is_collected;
     
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
    public $date_collected;
     
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->belongsTo("flashcard_term_id", "FlashcardTerm", "id", NULL);
		$this->belongsTo("user_id", "User", "id", NULL);

    }

    public function createData($minFlashcard, $maxFlashcard){
        $random = new Random();
        for($userId= 1; $userId <= User::count() ; $userId++){
            $numberFlashcard = rand($minFlashcard, $maxFlashcard);
            for($i = 1; $i <= $numberFlashcard ; $i++){
                $userFlashcard = new UserFlashcardTerm();
                $userFlashcard->user_id = $userId;
                $userFlashcard->flashcard_term_id = rand(1, FlashcardTerm::count());
                $userFlashcard->game_code = "PETZZLE";
                $userFlashcard->is_collected = rand(0,1);
                $userFlashcard->date_created = $random->random_created_date();
                $userFlashcard->date_updated = $random->random_created_date();
                $userFlashcard->date_collected = $random->random_created_date();
                $userFlashcard->save();
            }
        }
    }

}
