<?php


namespace YaM\Core;


abstract class Model
{

    /**
     * Заполнение модели данными из запроса
     *
     * @param array $fields
     */
    public function __construct($fields = array())
    {
        foreach ($fields as $name => $field) {
            $name = str_replace('_',' ',$name);
            $name = str_replace(' ','',ucwords($name));
            $method = "set".ucfirst($name);
            if (method_exists($this, $method)) {
                $this->$method($field);
            }
        }
    }
} 