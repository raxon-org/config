<?php
namespace Package\Raxon\Org\Config\Trait;

use Raxon\Org\App;

use Raxon\Org\Module\Core;
use Raxon\Org\Module\File;

use Raxon\Org\Node\Model\Node;

use Exception;
trait Import {

    public function role_system(): void
    {
        $object = $this->object();
        $package = $object->request('package');
        if($package){
            $node = new Node($object);
            $node->role_system_create($package);
        }
    }

    /**
     * @throws Exception
     */
    public function config_framework(): void
    {
        $object = $this->object();
        $package = $object->request('package');
        if($package){
            $options = App::options($object);
            $class = 'System.Config.Framework';
            $options->url = $object->config('project.dir.vendor') .
                $package . '/Data/' .
                $class .
                $object->config('extension.json')
            ;
            $node = new Node($object);
            $response = $node->import($class, $node->role_system(), $options);
            $node->stats($class, $response);
        }

    }

    /**
     * @throws Exception
     */
    public function config_ramdisk(): void
    {
        $object = $this->object();
        $package = $object->request('package');
        if($package){
            $options = App::options($object);
            $class = 'System.Config.Ramdisk';
            $options->url = $object->config('project.dir.vendor') .
                $package . '/Data/' .
                $class .
                $object->config('extension.json')
            ;
            $node = new Node($object);
            $response = $node->import($class, $node->role_system(), $options);
            $node->stats($class, $response);
            $response = $node->record($class, $node->role_system(), []);
            if(
                $response &&
                is_array($response) &&
                array_key_exists('node', $response) &&
                property_exists($response['node'], 'uuid')
            ){
                $uuid = Core::uuid();
                $patch = (object) [
                    'uuid' => $response['node']->uuid,
                    'name' => $uuid,
                    'url' => $object->config('framework.dir.temp') . $uuid . $object->config('ds')
                ];
                $response = $node->patch($class, $node->role_system(), $patch, []);
                if(
                    $response &&
                    is_array($response) &&
                    array_key_exists('node', $response) &&
                    property_exists($response['node'], 'uuid') &&
                    property_exists($response['node'], 'url') &&
                    !empty($response['node']->uuid) &&
                    !empty($response['node']->url)
                ){
                    echo 'Ramdisk patched with url ' . $response['node']->url . PHP_EOL;
                }
            }
        }

    }

    /**
     * @throws Exception
     */
    public function config_response(): void
    {
        $object = $this->object();
        $package = $object->request('package');
        if($package){
            $options = App::options($object);
            $class = 'System.Config.Response';
            $options->url = $object->config('project.dir.vendor') .
                $package . '/Data/' .
                $class .
                $object->config('extension.json')
            ;
            $node = new Node($object);
            $response = $node->import($class, $node->role_system(), $options);
            $node->stats($class, $response);
        }
    }

    /**
     * @throws Exception
     */
    public function config_service(): void
    {
        $object = $this->object();
        $package = $object->request('package');
        if($package){
            $options = App::options($object);
            $class = 'System.Config.Service';
            $options->url = $object->config('project.dir.vendor') .
                $package . '/Data/' .
                $class .
                $object->config('extension.json')
            ;
            $node = new Node($object);
            $response = $node->import($class, $node->role_system(), $options);
            $node->stats($class, $response);
        }

    }

    /**
     * @throws Exception
     */
    public function config(): void
    {
        $object = $this->object();
        $package = $object->request('package');
        if($package){
            $options = App::options($object);
            $class = 'System.Config';
            $options->url = $object->config('project.dir.vendor') .
                $package . '/Data/' .
                $class .
                $object->config('extension.json')
            ;
            $node = new Node($object);
            $response = $node->import($class, $node->role_system(), $options);
            $node->stats($class, $response);
        }
    }

    /**
     * @throws Exception
     */
    public function event(): void
    {
        $object = $this->object();
        $package = $object->request('package');
        if($package){
            $options = App::options($object);
            $class = 'System.Event';
            $options->url = $object->config('project.dir.vendor') .
                $package . '/Data/' .
                $class .
                $object->config('extension.json')
            ;
            $node = new Node($object);
            $response = $node->import($class, $node->role_system(), $options);
            $node->stats($class, $response);
        }
    }
}