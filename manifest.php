<?php
$manifest = array(
    'acceptable_sugar_versions' => array(),
    'acceptable_sugar_flavors' => array(),
    'readme' => '',
    'key' => 'PSI',
    'author' => 'Profiling Solutions',
    'description' => 'allow new Cases to automatically populate the Account Name if a Contact is specified',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'New Cases get Accounts',
    'published_date' => '2012-07-27 010:23:25',
    'type' => 'module',
    'version' => '1.0a',
);
$installdefs = array(
    'id' => 'NewCasesAccounts',
    'logic_hooks' => array(
        array(
            'module' => 'Cases',
            'hook' => 'before_save',
            'order' => 88,
            'description' => 'PSI Set Account Name',
            'file' => 'custom/modules/Cases/PSI_set_case_account.php',
            'class' => 'PSI_set_case_account',
            'function' => 'PSI_set_case_account',
        ),        
		array(
            'module' => 'Cases',
            'hook' => 'after_relationship_add',
            'order' => 88,
            'description' => 'PSI Set Account Name',
            'file' => 'custom/modules/Cases/PSI_set_case_account.php',
            'class' => 'PSI_set_case_account',
            'function' => 'PSI_set_case_account',
        ),
    ),
    'copy' => array(
        array(
            'from' => '<basepath>/PSI_set_case_account.php',
            'to' => 'custom/modules/Cases/PSI_set_case_account.php',
        ),
    ),
);