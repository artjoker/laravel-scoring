<?php

    return [

        /*
        |--------------------------------------------------------------------------
        | Scoring service RiskTools
        |--------------------------------------------------------------------------
        |
        | Enable or disable scoring services are you using
        |
        */
        'risk_tools' => [
            'enabled'    => true,
            'url'        => env('RISK_TOOLS_URL', null),
            'key'        => env('RISK_TOOLS_KEY', null),
            'sync'       => env('RISK_TOOLS_SYNC', false),
            'class'      => Artjoker\LaravelScoring\Providers\RiskTools::class,
            // Mapping model data (attributes) for get scoring
            'model_data' => [
                // For "scoring" method
                'id'              => 'public_id',     // ID of loan
                'user_id'         => 'client_id',     // ID of client
                'social_number'   => 'inn',           // INN of client
                'phone'           => 'phone',         // Phone of client
                'email'           => 'email',         // Email of client
                'passport_number' => 'passport',      // Passport (example АА123456 or number ID-card)
                'passport_date'   => 'passport_date', // Passport issue date (example "2001-12-01")
                'first_name'      => 'firstName',     // First name
                'last_name'       => 'lastName',      // Last name
                'other_name'      => 'middleName',    // Middle name
                'birth_date'      => 'birth_date',    // Birth date (example "2001-12-01")
                'gender_id'       => 'gender_id',     // Gender (1 - male, 2 - female)
                'loan_amount'     => 'sum',           // Amount of credit
                'loan_days'       => 'period',        // Number days of credit
                'applied_at'      => 'created_at',    // Date and time created loan (example "2018-04-05T19:29:51+03:00")
                'ip'              => 'ip',            // IP of client
                'user_agent'      => 'user_agent',    // User-Agent of browser of client
                'ubki'            => 'ubki',          // XML-data from UBKI

                // For "status" method
                // Status code of credit (1 - NEW, 2 - REJECT, 3 - APPROVED, 4 - ISSUED, 5 - CLOSED, 6 - OVERDUE)
                'status_id'       => 'status_code',
                'closed_at'       => 'closed_at',     // Date and time close loan (example "2018-04-25T10:05:00+03:00")
                'amount_to_pay'   => 'amount_debt',   // Total debt
                'total_paid'      => 'total_paid',    // The sum of all payments
                'overdue_days'    => 'overdue_days',  // The total number of days of delay of loan
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Scoring service Scorista
        |--------------------------------------------------------------------------
        |
        | Enable or disable scoring services are you using
        |
        */
        'scorista'   => [
            'enabled' => false,
        ],


    ];
