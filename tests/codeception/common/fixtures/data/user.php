<?php

return [
    [
        'id' => 1,
        'username' => 'webmaster',
        'auth_key' => 'tUu1qHcde0diwUol3xeI-18MuHkkprQI',
        'password_hash' => '$2y$13$VnLT62YdhKy.RHHDLN0MEezggGKZZKQFmPVu5d.5ODTwBGSx7WcW6',
        'password_reset_token' => 'RkD_Jw0_8HEedzLk7MM-ZKEFfYR7VbMr_1392559490',
        'created_at' => '1392559490',
        'updated_at' => '1392559490',
        'email' => 'webmaster@example.org',
        'role' => \common\models\User::ROLE_ADMINISTRATOR
    ],
    [
        'id' => 2,
        'username' => 'manager',
        'auth_key' => 'tUu1qHcde0diwUol3xeI-18MuHkkprQI',
        'password_hash' => '$2y$13$N785qekuqJzo2CsP7K0g/.KtWZ8SwZtqITdTPrHBFITYjX9WYnl5i',
        'password_reset_token' => 'RkD_Jw0_8HEedzLk7MM-ZKEFfYR7VbMr_1392559490',
        'created_at' => '1392559490',
        'updated_at' => '1392559490',
        'email' => 'user@example.org',
        'role' => \common\models\User::ROLE_MANAGER
    ],
    [
        'id' => 3,
        'username' => 'user',
        'auth_key' => 'tUu1qHcde0diwUol3xeI-18MuHkkprQI',
        'password_hash' => '$2y$13$tJKZTKUQ5DBFWNkkjd0goup.p8Tx5d9Mj/wWL6Vv8/Q038zk7g5.6',
        'password_reset_token' => 'RkD_Jw0_8HEedzLk7MM-ZKEFfYR7VbMr_1392559490',
        'created_at' => '1392559490',
        'updated_at' => '1392559490',
        'email' => 'user@example.org',
        'role' => \common\models\User::ROLE_USER
    ],
];
