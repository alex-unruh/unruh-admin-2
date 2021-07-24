<?php

return [
    /**
     * Labels for user profiles
     */
    'user_profiles' => [1 => 'Administrador', 2 => 'Editor', 3 => 'Visitante'],

    /**
     * Defines whether visits from authenticated users should be recorded
     */
    "register_authenticated" => true,

    /**
     * Defines the minimum number of hours to be displayed in the visits graph per day
     */
    "min_hours_to_display" => 12,

    /**
     * Defines the minimum number of days to be displayed in the visits graph per month
     */
    "min_days_to_display" => 15,

    /**
     * Defines the minimum number of days to be displayed in the visits graph per month
     */
    "min_months_to_display" => 12,

    /**
     * Defines the labels for the months to be displayed in the visits category by year
     */
    "months" => [
        1 => 'jan', 2 => 'fev', 3 => 'mar', 4 => 'abr', 5 => 'mai', 6 => 'jun',
        7 => 'jul', 8 => 'ago', 9 => 'set', 10 => 'out', 11 => 'nov', 12 => 'dez'
    ],

    /**
     * Property Types to Properties CRUD
     */
    "property_types" => [1 => "Galpão", 2 => 'Área Industrial', 3 => 'Terreno', 4 => 'Loja', 5 => 'Ponto Comercial'],
    
    /**
     * Brazil state labels
     */
    "ufs" => [
        'SP', 'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 
        'PA', 'PB', 'PE', 'PR', 'PI', 'RJ', 'RN', 'RO', 'RR', 'RS', 'SC', 'SE', 'TO'
    ],

    /**
     * Galleries that cannot be deleted
     */
    "protected_galleries" => ['slideshow'],
    
    /**
     * Categories that cannot be deleted
     */
    "protected_categories" => ['posts', 'imoveis', 'destaque', 'paginas', 'servicos'],

    /**
     * Posts that cannot be deleted
     */
    "protected_posts" => ['quem-somos']
];
