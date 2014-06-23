<?php




class SystemLanguage extends \Phalcon\Mvc\Model
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
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->hasMany("id", "SystemLabel", "language_id", NULL);

    }

}
