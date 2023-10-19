<?php
// src/Validator/Constraints/NameConstraint.php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class NameConstraint extends Constraint
{
    public $message = 'Le champ "{{ fieldName }}" doit commencer par une majuscule et ne doit pas contenir de chiffres ni de caractères spéciaux.';
    
    public function validatedBy()
    {
        return NameValidator::class;
    }
}
