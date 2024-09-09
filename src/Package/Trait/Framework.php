<?php
namespace Package\Raxon\Org\Config\Trait;

use Raxon\Org\Module\Event;

use Raxon\Org\Node\Model\Node;

use Exception;
trait Framework {


    /**
     * @throws Exception
     */
    public function environment($environment=''): void
    {
        $object = $this->object();
        $package = $object->request('package');

        $node = new Node($object);
        $record = $node->record('System.Config.Framework', $node->role_system(), []);
        if(
            $record &&
            is_array($record) &&
            array_key_exists('node', $record) &&
            is_object($record['node']) &&
            property_exists($record['node'], 'uuid')
        ){
            if(
                property_exists($record['node'], 'environment') &&
                $record['node']->environment !== $environment
            ){
                $patch = (object) [
                    'uuid' => $record['node']->uuid,
                    'environment' => $environment
                ];
                $node->patch('System.Config.Framework', $node->role_system(), $patch, []);
            }
        }
        Event::trigger($object, 'raxon.org.config.framework.environment.set', [
            'environment' => $environment
        ]);
    }
}