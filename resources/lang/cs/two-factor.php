<?php

return [
    'title' => 'Dvoufaktorové ověření',
    'description' => 'Přidejte novou bezpečnostní vrstvu vašemu účtu přidáním dvoufaktorového ověření.',
    'navigation_label' => 'Dvoufaktorové ověření',
    'field' => [
        'password' => 'Heslo',
        'code' => 'Kód',
        'recovery_code' => 'Obnovovací kód',
        'setup_key' => 'Nastavovací klíč',
    ],
    'button' => [
        'enable' => 'Povolit',
        'confirm' => 'Potvrdit',
        'cancel' => 'Zavřít',
        'disable' => 'Odebrat',
        'regenerate_recovery_code' => 'Obnovit obnovovací kódy',
        'show_recovery_codes' => 'Ukázat obnovovací kódy',
        'use_recovery_code' => 'Použít obnovovací kód',
        'use_authentication_code' => 'Použít přihlašovací kód',
        'log_in' => 'Přihlásit se',
    ],
    'status' => [
        'enabling' => 'Dokončete povolení dvoufaktorového ověření.',
        'enabled' => 'Máte aktivované dvoufaktorové ověření.',
        'disabled' => 'Nemáte aktivované dvoufaktorové ověření.',
    ],
    'message' => [
        'confirm_password' => 'Potvrďte heslo',
        'confirm_password_instructions' => 'Pro vaši bezpečnost, pro pokračování zadejte vaše heslo.',
        'password_not_match' => 'Toto heslo se neshoduje.',
        'invalid_code' => 'Zadaný kód pro dvoufaktorové ověření je chybný.',
        'invalid_recovery_code' => 'Zadaný obnovovací kód je chybný.',
        'confirm_access_with_authentication_code' => 'Pro pokračování musíte zadat kód pro dvoufaktorvé ověření, který najdete v aplikaci pro ověřování, kterou používáte.',
        'confirm_access_with_recovery_code' => 'Pro pokračování musíte zadat jeden z obnovovacích kódů.',
        'information' => 'Když je povoleno dvoufaktorové ověření, budete během přihlašování vyzváni k zadání kódu pro dvoufaktorové ověření. Tento kód můžete načíst z aplikace Google Authenticator v telefonu.',
        'finish_enabling' => 'Pro dokončení aktivace dvoufaktorového ověření, naskenujte následující QR kód pomocí aplikace pro ověřování v telefonu a zadejte vygenerovaný kód.',
        'store_recovery_codes' => 'Uložte si tyto kódy pro obnovení. Lze je použít k obnovení přístupu k vašemu účtu, pokud dojde ke ztrátě vašeho dvoufaktorového ověřovacího zařízení.',
    ],
];
