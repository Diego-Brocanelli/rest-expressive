<?php

namespace Core\Controller;

use Core\Controller\ControllerInterface;
use Core\Doctrine\BaseDoctrine;
use Doctrine\Common\Collections\ArrayCollection;

class ActionController implements ControllerInterface
{
    /**
     * EntityManager
     *
     * @var Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * Configuration EntityManager
     */
    public function __construct()
    {
        $baseDoctrine = new BaseDoctrine();
        $this->em = $baseDoctrine->em;
    }

    /**
     * Get data
     *
     * @param  string $namespace
     * @param  string $alias
     * @return array
     */
    public function fetchAll($namespace, $alias, $where = null)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select($alias)->from($namespace, $alias);

        if($where != null){
            $qb->where($where);
        }

        $query = $qb->getQuery();
        //return in Array
        $result = $query->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);

        return $result;
    }

    /**
     * [insert description]
     *
     * @param  [type] $object [description]
     * @return [type]         [description]
     */
    public function insert($object)
    {
        try{
            $this->em->persist($object);
            $this->em->flush();

            return true;

        }catch(\Exception $e){
            return false;
        }
    }

    /**
     * Update data in database
     *
     * @param  string $namespace
     * @param  array $data
     * @return boolean
     */
    public function update($namespace, $data)
    {
        try{
            if(!array_key_exists('id', $data)){
                return false;
            }
            // get register.
            $register = $this->em->getRepository($namespace)->find($data['id']);
            //update values
            $register->setData($data);
            // action update
            $this->em->persist($register);
            $this->em->flush();

            return true;

        }catch(\Exception $e){
            return false;
        }
    }

    public function delete($namespace, $id)
    {
        try{
            // get register.
            $register = $this->em->getRepository($namespace)->find($id);
            // action update
            $this->em->remove($register);
            $this->em->flush();

            return true;

        }catch(\Exception $e){
            return false;
        }
    }
}
