<?php
$params = [
    'adminEmail' => \common\config\ConfigDataLocal::$config['wodrow_qq_email'],
    'supportEmail' => \common\config\ConfigDataLocal::$config['wodrow_qq_email'],
    'robotEmail' => \common\config\ConfigDataLocal::$config['wodrow_qq_email'],
    'user.passwordResetTokenExpire' => 3600,
    'icon-framework' => 'fa',  // Font Awesome Icon framework
];

return $params;
