<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 13/10/17
 * Time: 13:46
 */

class Tag
{
    /**
     * @var int id
     */
    private $id;
    /**
     * @var string the tag name
     */
    private $name;

    /**
     * Tag constructor.
     * @param string $name
     */
    /*public function __construct($name)
    {
        $this->name = $name;
    }*/

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }



}