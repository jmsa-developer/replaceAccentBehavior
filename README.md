Yii2 Replace Accent Behavior

Install
Install via Composer:

composer require jmsa-developer/yii2-replace-accent-behavior
or add

"jmsa-developer/yii2-replace-accent-behavior" : "*"
to the require section of your composer.json file.

Configuring

use jmsadeveloper\behavior\SortableBehavior;

class Sample extends \yii\db\ActiveRecord
{
       public function behaviors()
        {
            return [
    
                [
                    'class' => ReplaceAccentBehavior::class,
                    'attributes' =>
                        [
                            'name',
                            'last_name',
                            'address'
                        ],
                ],
    
            ];
        }
}