<?php

return [
    'title' => 'Two Factor Authentication',
    'description' => 'Add additional security to your account using two factor authentication.',
    'navigation_label' => 'Two Factor Authentication',
    'field' => [
        'password' => 'Password',
        'code' => 'Code',
        'recovery_code' => 'Recovery Code',
        'setup_key' => 'Setup Key',
    ],
    'button' => [
        'enable' => 'Enable',
        'confirm' => 'Confirm',
        'cancel' => 'Cancel',
        'disable' => 'Disable',
        'regenerate_recovery_code' => 'Regenerate Recovery Codes',
        'show_recovery_codes' => 'Show Recovery Codes',
        'use_recovery_code' => 'Use a recovery code',
        'use_authentication_code' => 'Use an authentication code',
        'log_in' => 'Log in',
    ],
    'status' => [
        'enabling' => 'Finish enabling two factor authentication.',
        'enabled' => 'You have enabled two factor authentication.',
        'disabled' => 'You have not enabled two factor authentication.',
    ],
    'message' => [
        'confirm_password' => 'Confirm Password',
        'confirm_password_instructions' => 'For your security, please confirm your password to continue.',
        'password_not_match' => 'This password does not match our records.',
        'invalid_code' => 'The provided two factor authentication code was invalid.',
        'confirm_access_with_authentication_code' => 'Please confirm access to your account by entering the authentication code provided by your authenticator application.',
        'confirm_access_with_recovery_code' => 'Please confirm access to your account by entering one of your emergency recovery codes.',
        'information' => 'When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.',
        'finish_enabling' => 'To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.',
        'store_recovery_codes' => 'Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.',
    ],
];
