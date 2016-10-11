<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblAdminMenu
 *
 * @ORM\Table(name="tbl_admin_menu")
 * @ORM\Entity
 */
class TblAdminMenu {

    /**
     * @var integer
     *
     * @ORM\Column(name="menu_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $menuId;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=32, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, nullable=true)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=64, nullable=true)
     */
    private $file;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=true)
     */
    private $parentId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ordermenu", type="integer", nullable=true)
     */
    private $ordermenu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="super", type="boolean", nullable=true)
     */
    private $super = '0';

    /**
     * @ORM\OneToMany(targetEntity="Model\TblAdminPermission", mappedBy="menu")
     */
    private $permission;
    
    public function __construct() {
        $this->permission = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get menuId
     *
     * @return integer
     */
    public function getMenuId() {
        return $this->menuId;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return TblAdminMenu
     */
    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return TblAdminMenu
     */
    public function setAlias($alias) {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias() {
        return $this->alias;
    }

    /**
     * Set file
     *
     * @param string $file
     *
     * @return TblAdminMenu
     */
    public function setFile($file) {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return TblAdminMenu
     */
    public function setParentId($parentId) {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId() {
        return $this->parentId;
    }

    /**
     * Set ordermenu
     *
     * @param integer $ordermenu
     *
     * @return TblAdminMenu
     */
    public function setOrdermenu($ordermenu) {
        $this->ordermenu = $ordermenu;

        return $this;
    }

    /**
     * Get ordermenu
     *
     * @return integer
     */
    public function getOrdermenu() {
        return $this->ordermenu;
    }

    /**
     * Set super
     *
     * @param boolean $super
     *
     * @return TblAdminMenu
     */
    public function setSuper($super) {
        $this->super = $super;

        return $this;
    }

    /**
     * Get super
     *
     * @return boolean
     */
    public function getSuper() {
        return $this->super;
    }

}
