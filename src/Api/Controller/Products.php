<?php

namespace Api\Controller;

use Api\Model\Products as ModelProducts;
use Core\Controller\ActionController;
use Doctrine\ORM\EntityManager;

class Products extends ActionController
{
    /**
     * Get products
     *
     * @param  int $id
     * @return boolean
     */
    public function getProducts($id = null)
    {
        $where = null;
        if($id != null){
            $id = (int) $id;
            $where = "p.id = $id";
        }
        $products = self::fetchAll('Api\Model\Products', 'p', $where);

        return $products;
    }

    /**
     * Insert product in database
     *
     * @return boolean
     */
    public function insertProduct($data)
    {
        try{
            $products = new ModelProducts();

            $products->setData($data);

            self::insert($products);

            return true;

        }catch(\Exception $e){
            return false;
        }
    }

    /**
     * Update product
     *
     * @param  array $params
     * @return boolean
     */
    public function updateProduct($params)
    {
        try{
            $products = new ModelProducts();
            $products->setData($params);

            self::update('Api\Model\Products', $params);

            return true;

        }catch(\Excetion $e){
            return false;
        }
    }

    /**
     * Delete product
     *
     * @param  int $id
     * @return boolean
     */
    public function removeProduct($id)
    {
        try {
            self::delete('Api\Model\Products', (int)$id);

            return true;

        } catch (\Exception $e) {
            return false;
        }

    }
}
