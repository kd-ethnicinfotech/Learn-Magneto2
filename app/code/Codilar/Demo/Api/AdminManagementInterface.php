<?php
namespace Codilar\Demo\Api;

interface AdminManagementInterface
{
    /**
     * Get admin user info by ID
     *
     * @param  int $adminId
     * @return mixed
     */
    public function getAdminById($adminId);
}
