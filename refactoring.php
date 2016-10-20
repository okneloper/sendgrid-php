<?php

class Setting implements \JsonSerializable
{
    protected $attributes;

    public function __get($prop)
    {
        return $this->attributes[$prop];
    }

    public function __set($prop, $value)
    {
        $this->attributes[$prop] = $value;
    }

    public function __construct($availableAttributes)
    {
        // initialize the avaliable attributes
        foreach ($availableAttributes as $attribute) {
            $this->attributes[$attribute] = null;
        }
    }

    public function jsonSerialize()
    {
        return array_filter($this->attributes, function ($value) {
            return $value !== null;
        });
    }
}

/**
 * Class ClickTracking
 *
 * @property bool $enable
 * @property bool $enable_text
 */
class ClickTracking extends Setting
{
    public function __construct()
    {
        parent::__construct(['enable', 'enable_text']);
    }
}

$click = new ClickTracking();
$click->enable = true;
$click->enable_text = false;

var_dump($click->jsonSerialize());
