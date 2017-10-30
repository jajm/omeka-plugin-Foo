<?php

class FooPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'initialize',
    );

    public function hookInitialize()
    {
        $events = Zend_EventManager_StaticEventManager::getInstance();
        $events->attach('OmekaCli', 'commands', function() {
            return array(
                'foo:bar' => array(
                    'class' => 'Foo_Bar',
                    'aliases' => array('bar'),
                ),
            );
        });
    }
}
