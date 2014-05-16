<?php


namespace YaM\Core;


abstract class Factory
{
    protected $containers;

    protected abstract function map();

    public function getContainer($name)
    {
        if (!array_key_exists($name, $this->containers)) {
            $map = $this->map();

            if (array_key_exists($name, $map)) {
                $this->containers[$name] = $map[$name];
            } else {
                throw new \Exception("Container $name Not Isset");
            }
        }

        return $this->containers[$name];
    }
} 