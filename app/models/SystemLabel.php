<?php




class SystemLabel extends \Phalcon\Mvc\Model
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
    public $language_id;
     
    /**
     *
     * @var string
     */
    public $section;
     
    /**
     *
     * @var string
     */
    public $key;
     
    /**
     *
     * @var string
     */
    public $value;
     
    /**
     *
     * @var string
     */
    public $hint;
     
    /**
     *
     * @var string
     */
    public $is_approved;
     
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->belongsTo("language_id", "SystemLanguage", "id", NULL);

    }

}
