<?php

namespace App\Entity;

use App\Application\Database;

class produit extends Database
{


    ////@var int

    private $id;

    //@var string

    private $designation;
    ///@var float

    private $price;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of designation
     */ 
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set the value of designation
     *
     * @return  self
     */ 
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    public function add(string $designation, float $price){
        $sql = `insert into produit(designation,price)
                values(:designation, :price)`;

                $this->prepare($sql);
                $this->bindParam('designation',$designation, \PDO::PARAM_STR);
                $this->bindParam('price',$price, \PDO::PARAM_STR);
                $this->execute();
    }

public function delete ( int $id )
{
    $sql = 'delete from produit where id = id';
    $this->prepare($sql);
    $this->binParam(':id', \PDO::PARAM_INT);
    $this->execute();
}

public function edit(int $id, $designation, float $price)
{
$sql ='update produit set designation:designation, price=:price
        where id=id';
    $this->prepare($sql);
    $this->binParam(':id', $id, \PDO::PARAM_INT);
    $this->binParam(':designation', $designation, \PDO::PARAM_STR);
    $this->binParam(':price', $price, \PDO::PARAM_INT);
    $this->execute();

}

public function getAll()
{
    $sql = 'select id, designation, price
            from produit';
    $this->prepare($sql);
    $this->execute();
    return $this->fetchAll();
}

public function getOne(int $id)
{
    $sql = 'select id, designation, price
            from produit where id=:id';
    $this->prepare($sql);
    $this->bindParam(`:id` , $id, \PDO::PARAM_INT);
    $this->execute();
    return $this->fetchOne();
}

}