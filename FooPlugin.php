<?php

class FooPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'initialize',
        'install',
        'uninstall',
    );

    protected $_options = array(
        'foo_bar' => 'baz',
    );

    public function hookInitialize()
    {
        $events = Zend_EventManager_StaticEventManager::getInstance();
        $events->attach('OmekaCli', 'commands', function () {
            return array('Foo_Bar');
        });
    }

    public function hookInstall()
    {
        $this->_installOptions();
    }

    public function hookUninstall()
    {
        $this->_uninstallOptions();
    }
}
