<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblAdminPermission
 *
 * @ORM\Table(name="tbl_admin_permission", indexes={@ORM\Index(name="fk_permission_menu", columns={"menu_id"}), @ORM\Index(name="fk_permission_usuer", columns={"user_id"})})
 * @ORM\Entity
 */
class TblAdminPermission
{
    /**
     * @var integer
     *
     * @ORM\Column(name="permission_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $permissionId;

    /**
     * @var \Model\TblAdminMenu
     *
     * @ORM\ManyToOne(targetEntity="Model\TblAdminMenu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menu_id", referencedColumnName="menu_id")
     * })
     */
    private $menu;

    /**
     * @var \Model\TblAdminUsuario
     *
     * @ORM\ManyToOne(targetEntity="Model\TblAdminUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="usuario_id")
     * })
     */
    private $user;



    /**
     * Get permissionId
     *
     * @return integer
     */
    public function getPermissionId()
    {
        return $this->permissionId;
    }

    /**
     * Set menu
     *
     * @param \Model\TblAdminMenu $menu
     *
     * @return TblAdminPermission
     */
    public function setMenu(\Model\TblAdminMenu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \Model\TblAdminMenu
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set user
     *
     * @param \Model\TblAdminUsuario $user
     *
     * @return TblAdminPermission
     */
    public function setUser(\Model\TblAdminUsuario $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Model\TblAdminUsuario
     */
    public function getUser()
    {
        return $this->user;
    }
}
