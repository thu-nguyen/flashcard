<?php




class FlashcardLanguage extends \Phalcon\Mvc\Model
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
    public $name;
     
    /**
     *
     * @var string
     */
    public $code;
     
    /**
     *
     * @var integer
     */
    public $position;
     
    /**
     *
     * @var string
     */
    public $is_disabled;
     
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->hasMany("id", "FlashcardTerm", "language_id", NULL);

    }
    public function createData(){
        $langs = array("en" => "English", "vi" => "Vietnamese", "fr" => "France");
        foreach($langs as $code => $name){
            $language = new FlashcardLanguage();
            $language->name = $name;
            $language->code = $code;
            $language->position = FlashcardLanguage::count()+1;
            $language->is_disabled = 0;
            $language->save();
        }
        
    }

}
