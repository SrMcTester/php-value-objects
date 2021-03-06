<?php

namespace PhpValueObjects;

abstract class AbstractValueObject
{

    protected $value;

    public function __construct($value)
    {
        if (null !== $value) {
            $this->guard($value);
        }

        $this->value = $value;
    }

    abstract protected function guard($value): void;

    public function value()
    {
        return $this->value;
    }
}
