<?php
/**
 * Created by PhpStorm.
 * User: JMSA
 * Date: 31/7/2019
 * Time: 12:38 PM
 */

namespace jmsadeveloper\behavior;

use yii\base\Behavior;
use yii\db\ActiveRecord;

class ReplaceAccentBehavior extends Behavior
{

    /**
     * @var array attributes
     */
    public $attributes = [];

    /**
     *  Before validate is executed the cleaning process
     **/
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }
    /**
     * Before validate event
     */
    public function beforeValidate()
    {
        foreach ($this->attributes as $attribute)
        {
            $this->owner->$attribute = $this->process($this->owner->$attribute);
        }
    }

    /**
     * Function that replaces accented letters with their corresponding non-accented letter
     * @param $data - String to clean
     * @return mixed - Returns a string without accents and replaced by its unticked characters.
     */
    function process($data)
    {
        $not_allow = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
        $allow = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
        return str_replace($not_allow, $allow, $data);
    }

}