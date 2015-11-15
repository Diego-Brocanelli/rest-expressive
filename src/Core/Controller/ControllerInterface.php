<?php

namespace Core\Controller;

interface ControllerInterface
{
    public function fetchAll($namespace, $alias);

    public function insert($object);

    public function update($namespace, $data);

    public function delete($namespace, $id);
}
