<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => "Le champ :attribute doit être accepté.",
    "welcome"         => "WAFAA",
    "active_url"       => "Le champ :attribute n'est pas une URL valide.",
    "after"            => "Le champ :attribute doit être une date postérieure au :date.",
    "alpha"            => "Le champ :attribute doit seulement contenir des lettres.",
    "alpha_dash"       => "Le champ :attribute doit seulement contenir des lettres, des chiffres et des tirets.",
    "alpha_num"        => "Le champ :attribute doit seulement contenir des chiffres et des lettres.",
    "before"           => "Le champ :attribute doit être une date antérieure au :date.",
    "between"          => array(
        "numeric" => "La valeur de :attribute doit être comprise entre :min et :max.",
        "file"    => "Le fichier :attribute doit avoir une taille entre :min et :max kilobytes.",
        "string"  => "Le texte :attribute doit avoir entre :min et :max caractères.",
    ),
    "confirmed"        => "Le champ de confirmation :attribute ne correspond pas.",
    "date"             => "Le champ :attribute n'est pas une date valide.",
    "date_format"      => "Le champ :attribute ne correspond pas au format :format.",
    "different"        => "Les champs :attribute et :other doivent être différents.",
    "digits"           => "Le champ :attribute doit avoir :digits chiffres.",
    "digits_between"   => "Le champ :attribute doit avoir entre :min and :max chiffres.",
    "email"            => "Le format du champ :attribute est invalide.",
    "exists"           => "Le champ :attribute sélectionné est invalide.",
    "image"            => "Le champ :attribute doit être une image.",
    "in"               => "Le champ :attribute est invalide.",
    "integer"          => "Le champ :attribute doit être un entier.",
    "ip"               => "Le champ :attribute doit être une adresse IP valide.",
    "max"              => array(
        "numeric" => "La valeur de :attribute ne peut être supérieure à :max.",
        "file"    => "Le fichier :attribute ne peut être plus gros que :max kilobytes.",
        "string"  => "Le :attribute ne peut contenir plus de :max caractères.",
    ),
    "mimes"            => "Le champ :attribute doit être un fichier de type : :values.",
    "min"              => array(
        "numeric" => "La valeur de :attribute doit être inférieure à :min.",
        "file"    => "Le fichier :attribute doit être plus que gros que :min kilobytes.",
        "string"  => "Le :attribute doit contenir au moins :min caractères.",
    ),
    "not_in"           => "Le champ :attribute sélectionné n'est pas valide.",
    "numeric"          => "Le champ :attribute doit contenir un nombre.",
    "regex"            => "Le format du champ :attribute est invalide.",
    "required"         => "Le champ :attribute est obligatoire.",
    "required_if"      => "Le champ :attribute est obligatoire quand la valeur de :other est :value.",
    "required_with"    => "Le champ :attribute est obligatoire quand :values est présent.",
    "required_without" => "Le champ :attribute est obligatoire quand :values n'est pas présent.",
    "same"             => ":attribute et :other doivent être identiques.",
    "size"             => array(
        "numeric" => "La taille de la valeur de :attribute doit être :size.",
        "file"    => "La taille du fichier de :attribute doit être de :size kilobytes.",
        "string"  => "Le texte de :attribute doit contenir :size caractères.",
    ),
    'string'           => 'Le champ :attribute doit être une chaîne de caractère.',
    "unique"           => "La valeur du champ :attribute est déjà utilisée.",
    "url"              => "Le format de l'URL de :attribute n'est pas valide.",
    'uploaded' => 'Echec du téléchargement des l\'images.',
    'matcholdpasswor' => 'Le mot de passe saisi n’est pas valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'condition' => [
            'required' => 'Vous devez accepter nos conditions d’utilisation pour poster l’annonce',
        ],
        'email' => [
            'unique' => 'Vous êtes déjà inscrit',
        ],
        'password' => [
            'regex' => 'Votre mot de passe doit inclure au moins une lettre minuscule et un chiffre.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'username' => 'Nom d\'utilisateur',
        'nom' => 'Nom',
        'prenom' => 'Prénom',
        'adresse' => 'Adresse',
        'phone' => 'Numéro de télephone',
        'email' => 'Email',
        'password' => 'Mot de passe',
        'confirmPassword' => 'Confirmer mot de passe',
        'password_confirmation' => 'Confirmer mot de passe',
        'fileToUpload' => 'MÉDIA',
        'categorie' => 'Catégorie',
        'sousCat' => 'Sous catégorie',
        'wilaya' => 'Wilaya',
        'Adtitle' => 'Titre de l\'annonce',
        'descrp' => 'Description',
        'subject' => 'Sujet',
        'name' => 'Nom'
    ],

];
