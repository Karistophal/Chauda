<?php
// src/Validator/Constraints/NameValidator.php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class NameValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        // Check if the field starts with an uppercase letter and does not contain digits or special characters
        if (!preg_match('/^[A-Z][^0-9@#$%^&+=\s]*$/', $value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ fieldName }}', $value) // Utilisez directement $value ici
                ->addViolation();
        }
    }
}
