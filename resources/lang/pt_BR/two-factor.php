<?php

return [
    'title' => 'Autenticação de Dois Fatores',
    'description' => 'Adicione segurança adicional à sua conta usando autenticação de dois fatores.',
    'navigation_label' => 'Autenticação de Dois Fatores',
    'field' => [
        'password' => 'Senha',
        'code' => 'Código',
        'recovery_code' => 'Código de Recuperação',
        'setup_key' => 'Chave de Configuração',
    ],
    'button' => [
        'enable' => 'Ativar',
        'confirm' => 'Confirmar',
        'cancel' => 'Cancelar',
        'disable' => 'Desativar',
        'regenerate_recovery_code' => 'Gerar Códigos de Recuperação Novamente',
        'show_recovery_codes' => 'Exibir Códigos de Recuperação',
        'use_recovery_code' => 'Use um código de recuperação',
        'use_authentication_code' => 'Use um código de autenticação',
        'log_in' => 'Entrar',
    ],
    'status' => [
        'enabling' => 'Termine de ativar a autenticação de dois fatores.',
        'enabled' => 'Você ativou a autenticação de dois fatores.',
        'disabled' => 'Você não ativou a autenticação de dois fatores.',
    ],
    'message' => [
        'confirm_password' => 'Confirmar Senha',
        'confirm_password_instructions' => 'Para sua segurança, confirme sua senha para continuar.',
        'password_not_match' => 'Esta senha não corresponde aos nossos registros.',
        'invalid_code' => 'O código de autenticação de dois fatores fornecido era inválido.',
        'confirm_access_with_authentication_code' => 'Confirme o acesso à sua conta inserindo o código de autenticação fornecido pelo seu aplicativo autenticador.',
        'confirm_access_with_recovery_code' => 'Confirme o acesso à sua conta digitando um dos seus códigos de recuperação de emergência.',
        'information' => 'Quando a autenticação de dois fatores estiver ativada, você será solicitado a fornecer um código seguro e aleatório durante a autenticação. Você pode gerar esse código pelo aplicativo Google Authenticator do seu telefone.',
        'finish_enabling' => 'Para concluir a ativação da autenticação de dois fatores, escaneie o Código QR a seguir usando o aplicativo do seu telefone ou insira a chave de configuração, em seguida digite o código gerado pelo aplicativo para validar a ativação.',
        'store_recovery_codes' => 'Salve esses códigos de recuperação em um gerenciador de senhas seguro. Eles podem ser usados para recuperar o acesso à sua conta se seu dispositivo de autenticação de dois fatores for perdido.',
    ],
];
