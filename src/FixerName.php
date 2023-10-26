<?php

declare(strict_types=1);

namespace GrafemaPHPCS\Fixer;

/**
 * The Fixer Trait.
 */
trait FixerName
{
    public function getName(): string
    {
        $name = parent::getName();

        return 'GrafemaPHPCS/'.$name;
    }
}
