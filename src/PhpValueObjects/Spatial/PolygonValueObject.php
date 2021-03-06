<?php

declare(strict_types=1);

namespace PhpValueObjects\Spatial;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Spatial\Exception\InvalidPolygonException;

class PolygonValueObject extends AbstractValueObject
{
    protected function guard($value): void
    {
        if (false === is_array($value)) {
            throw new InvalidPolygonException();
        }

        if (3 > count($value)) {
            throw new InvalidPolygonException();
        }

        $first = $value[0];
        $end = end($value);

        foreach ($value as $point) {
            if (false === is_array($point)) {
                throw new InvalidPolygonException();
            }

            if (2 !== count($point)) {
                throw new InvalidPolygonException();
            }
        }

        if (false === ($first == $end)) {
            throw new InvalidPolygonException();
        }
    }
}
