<?php

namespace Core\Model;

class Entity
{
    /**
     * Set data for Entity
     *
     * @param Array $data
     */
    public function setData(Array $data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Get data for entity
     *
     * @param  string $key
     * @return string
     */
    public function getData($key)
    {
        return $this->$key;
    }
}
