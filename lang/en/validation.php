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

    'accepted' => 'Il :attribute deve essere accettato.',
    'accepted_if' => 'Il :attribute deve essere accettato quando :other è :value.',
    'active_url' => "Il :attribute non ha l'URL valida.",
    'after' => 'Il :attribute deve essere una data dopo :date.',
    'after_or_equal' => 'The :attribute deve essere una data dopo o uguale a :date.',
    'alpha' => 'Il :attribute deve contenere solo lettere.',
    'alpha_dash' => 'Il :attribute deve contenere solo lettere, numeri, trattini e sottolineature.',
    'alpha_num' => 'Il :attribute deve contenere solo lettere e numeri.',
    'array' => 'Il :attribute deve essere un array.',
    'ascii' => 'Il :attribute deve contenere solo caratteri e simboli alfanumerici a byte singolo.',
    'before' => 'Il :attribute deve essere una data prima :date.',
    'before_or_equal' => 'Il :attribute deve essere una data prima o uguale a :date.',
    'between' => [
        'array' => "Il :attribute deve avere tra :min e :max d'elementi.",
        'file' => 'Il :attribute deve essere tra :min e :max di kilobytes.',
        'numeric' => 'Il :attribute deve essere tra :min e :max.',
        'string' => 'Il :attribute deve essere tra :min e :max di caratteri.',
    ],
    'boolean' => "Il :attribute campo dev'essere vero o falso.",
    // vanno cambiate tutte in italiano?
    'confirmed' => 'Le due :attribute non corrispondono',
    'current_password' => 'La password non è corretta.',
    'date' => ' :attribute non è una data valida.',
    'date_equals' => ':attribute deve essere una data pari a :date.',
    'date_format' => ':attribute non corrisponde al formato :format.',
    'decimal' => ':attribute deve avere :decimal decimale.',
    'declined' => ':attribute deve essere rifiutato.',
    'declined_if' => ':attribute deve essere rifiutato quando :other è :value.',
    'different' => ':attribute e :other deve essere diverso.',
    'digits' => ':attribute deve essere :digits cifre.',
    'digits_between' => ':attribute deve essere tra :min e :max cifre.',
    'dimensions' => ":attribute ha dimensioni dell'immagine non valide.",
    'distinct' => ':attribute il campo ha un valore duplicato.',
    'doesnt_end_with' => ':attribute potrebbe non finire con uno dei seguenti: :values.',
    'doesnt_start_with' => ':attribute potrebbe non iniziare con uno dei seguenti: :values.',
    'email' => ':attribute deve essere un indirizzo email valido.',
    'ends_with' => ':attribute deve finire con uno dei seguenti: :values.',
    'enum' => 'selected :attribute non è valido.',
    'exists' => 'selected :attribute non è valido.',
    'file' => ':attribute deve essere un file.',
    'filled' => ':attribute il campo deve avere un valore.',
    'gt' => [
        'array' => ':attribute deve avere più di :value elementi.',
        'file' => ':attribute deve essere maggiore di :value kilobytes.',
        'numeric' => ':attribute deve essere maggiore di :value.',
        'string' => ':attribute deve essere maggiore di :value caratteri.',
    ],
    'gte' => [
        'array' => ':attribute deve avere :value elementi o di più.',
        'file' => ':attribute deve essere maggiore o uguale a :value kilobytes.',
        'numeric' => ':attribute deve essere maggiore o uguale a :value.',
        'string' => ':attribute deve essere maggiore o uguale a :value caratteri.',
    ],
    'image' => ':attribute deve essere un immagine.',
    'in' => 'Il selettore :attribute non è valido.',
    'in_array' => ':attribute il campo non esiste in :other.',
    'integer' => ':attribute deve essere un numero intero.',
    'ip' => ':attribute deve essere un indirizzo IP valido.',
    'ipv4' => ':attribute deve esser un indirizzo IPv4 valido.',
    'ipv6' => ':attribute deve esser un indirizzo IPv6 valido.',
    'json' => ':attribute deve esser un testo JSON valido.',
    'lowercase' => ':attribute deve essere minuscolo.',
    'lt' => [
        'array' => ':attribute deve avere meno di :value elementi.',
        'file' => ':attribute deve essere inferiore a :value kilobytes.',
        'numeric' => ':attribute deve essere inferiore a :value.',
        'string' => ':attribute deve essere inferiore a :value caratteri.',
    ],
    'lte' => [
        'array' => ':attribute non deve avere più di :value elementi.',
        'file' => ':attribute deve essere inferiore o uguale a :value kilobytes.',
        'numeric' => ':attribute deve essere inferiore o uguale a :value.',
        'string' => ':attribute deve essere inferiore o uguale a :value carattere.',
    ],
    'mac_address' => ':attribute deve essere un indirizzo Mac valido.',
    'max' => [
        'array' => ':attribute non deve avere più di :max elementi.',
        'file' => ':attribute non deve essere maggiore di :max kilobytes.',
        'numeric' => ':attribute non deve essere maggiore di :max.',
        'string' => ':attribute non deve essere maggiore di :max caratteri.',
    ],
    'max_digits' => ':attribute non deve avere più di :max cifre.',
    'mimes' => ':attribute deve essere un file di tipo: :values.',
    'mimetypes' => ':attribute deve essere un file di tipo: :values.',
    'min' => [
        'array' => ':attribute deve avere almeno :min items.',
        'file' => ':attribute deve essere almeno :min kilobytes.',
        'numeric' => ':attribute deve essere almeno :min.',
        'string' => ':attribute deve essere almeno :min caratteri.',
    ],
    'min_digits' => ':attribute deve essere almeno :min cifre.',
    'missing' => ':attribute il campo deve mancare.',
    'missing_if' => ':attribute il campo deve mancare quando :other è :value.',
    'missing_unless' => ':attribute il campo deve mancare a meno che :other è :value.',
    'missing_with' => ':attribute il campo deve mancare quando :values è presente.',
    'missing_with_all' => ':attribute il campo deve mancare quando :values sono presenti.',
    'multiple_of' => ':attribute deve essere un multiplo di :value.',
    'not_in' => 'Il selettore :attribute non è valido.',
    'not_regex' => ':attribute formato non è valido.',
    'numeric' => ':attribute deve essere un numero.',
    'password' => [
        'letters' => ':attribute deve contenere almeno una lettera.',
        'mixed' => ':attribute deve contenere almeno una lettera maiuscola e una lettera minuscola.',
        'numbers' => ':attribute deve contenere almeno un numero.',
        'symbols' => ':attribute deve contenere almeno un simbolo .',
        'uncompromised' => 'Il dato :attribute è apparso in una perdita di dati. Scegli un diverso :attribute.',
    ],
    'present' => ':attribute il campo deve essere presente.',
    'prohibited' => ':attribute il campo è vietato.',
    'prohibited_if' => ':attribute il campo è vietato quando :other è :value.',
    'prohibited_unless' => ':attribute il campo è vietato salvo che :other è in :values.',
    'prohibits' => ":attribute il campo è vietato :other dall'essere presente.",
    'regex' => ':attribute formato non è valido.',
    'required' => ':attribute il campo è obbligatorio.',
    'required_array_keys' => ':attribute il campo deve contenere voci per: :values.',
    'required_if' => ':attribute il campo è obbligatorio quando :other è :value.',
    'required_if_accepted' => ':attribute il campo è obbligatorio quando  :other è accepted.',
    'required_unless' => ':attribute  il campo è obbligatorio salvo che :other è in :values.',
    'required_with' => ':attribute il campo è obbligatorio quando :values è presente.',
    'required_with_all' => ':attribute il campo è obbligatorio quando :values sono presenti.',
    'required_without' => ':attribute il campo è obbligatorio quando :values non è presente.',
    'required_without_all' => ':attribute il campo è obbligatorio quando nessuno o :values sono presenti.',
    'same' => ':attribute e :other deve combaciare.',
    'size' => [
        'array' => ':attribute deve contenere :size elementi.',
        'file' => ':attribute deve contenere :size kilobytes.',
        'numeric' => ':attribute deve contenere :size.',
        'string' => ':attribute deve contenere :size caratteri.',
    ],
    'starts_with' => ':attribute deve iniziare con uno dei seguenti: :values.',
    'string' => ':attribute deve essere una stringa.',
    'timezone' => ':attribute deve essere un fuso orario valido.',
    'unique' => ':attribute è già stata presa.',
    'uploaded' => ':attribute impossibile caricare.',
    'uppercase' => ':attribute deve essere maiuscolo.',
    'url' => ':attribute deve essere valido URL.',
    'ulid' => ':attribute deve essere valido ULID.',
    'uuid' => ':attribute deve essere valido UUID.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
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

    'attributes' => [],

];