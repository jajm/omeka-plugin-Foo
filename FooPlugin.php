<?php

class FooPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'initialize',
        'install',
        'uninstall',
    );
    
    public function hookInitialize()
    {
        $events = Zend_EventManager_StaticEventManager::getInstance();
        $events->attach('OmekaCli', 'commands', function() {
            return array(array(
                'class' => 'Foo_Bar',
                'aliases' => array('bar'),
            ));
        });
    }

    public function hookInstall($args)
    {
        $db = get_db();
        $sql = "
            CREATE TABLE IF NOT EXISTS `$db->foo` (
              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              `reviewed` timestamp NULL,
              `item_id` int(10) NOT NULL,
              `comment` text COLLATE utf8_unicode_ci,
              `status` tinytext NULL,
              `owner_id` int(10) NULL,
              `email` tinytext NULL,
              `may_contact` BOOLEAN NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";
        $db->query($sql);
    }

    public function hookUninstall($args)
    {
        $db = get_db();
        $sql = "DROP TABLE IF EXISTS `$db->CorrectionsCorrection`";
        $db->query($sql);
    }
}
