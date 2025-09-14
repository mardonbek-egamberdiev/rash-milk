<?php

namespace common\components;

use InvalidArgumentException;
use yii\base\Behavior;
use yii\db\BaseActiveRecord;

class TimestampConvertorBehavior extends Behavior
{

    /**
     * @var string|array attribute(s) to convert to timestamp
     */
    public $attribute = 'date';

    public function init()
    {
        if (empty($this->attribute)) {
            throw new InvalidArgumentException('The "attribute" property must be set!');
        }
    }

    public function events()
    {
        return [
            BaseActiveRecord::EVENT_BEFORE_INSERT => 'convertToTimestamp',
            BaseActiveRecord::EVENT_BEFORE_UPDATE => 'convertToTimestamp',
        ];
    }

    public function convertToTimestamp()
    {
        $attributes = (array)$this->attribute;
        foreach ($attributes as $attribute) {
            $value = $this->owner->$attribute;
            if (!empty($value) && !$this->isTimestamp($value)) {
                $this->owner->$attribute = strtotime($this->owner->$attribute);
            }
        }
    }

    private function isTimestamp($string)
    {
        return (1 === preg_match('~^[1-9][0-9]*$~', $string));
    }
}