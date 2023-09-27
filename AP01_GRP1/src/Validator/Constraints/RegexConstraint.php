<?php
// src/Validator/Constraints/RegexConstraint.php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class RegexConstraint extends Constraint
{
    public $regexMessage = 'Le mot de passe doit contenir au moins une lettre majuscule, un chiffre, un caractère spécial (@, #, $, %, ^, &, +, =) et aucun espace.';
    
    public $pattern = '/^(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&+=])(?=\S+$)/';

    public $minLengthMessage = 'Le mot de passe doit contenir au moins {{ minLength }} caractères.';
    public $minLength = 8;

    public $matchField; // Utilisé pour spécifier le champ de correspondance si nécessaire
    public $matchMessage = 'Les mots de passe ne correspondent pas'; // Message personnalisé pour la correspondance des mots de passe

    public function validatedBy()
    {
        return RegexValidator::class;
    }
}
