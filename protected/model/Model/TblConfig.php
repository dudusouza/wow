<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblConfig
 *
 * @ORM\Table(name="tbl_config")
 * @ORM\Entity
 */
class TblConfig
{
    /**
     * @var integer
     *
     * @ORM\Column(name="config_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $configId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="val", type="text", length=65535, nullable=true)
     */
    private $val;



    /**
     * Get configId
     *
     * @return integer
     */
    public function getConfigId()
    {
        return $this->configId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TblConfig
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set val
     *
     * @param string $val
     *
     * @return TblConfig
     */
    public function setVal($val)
    {
        $this->val = $val;

        return $this;
    }

    /**
     * Get val
     *
     * @return string
     */
    public function getVal()
    {
        return $this->val;
    }
}
