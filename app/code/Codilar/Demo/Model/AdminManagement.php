<?php
namespace Codilar\Demo\Model;

use Codilar\Demo\Api\AdminManagementInterface;
use Magento\User\Model\UserFactory;

class AdminManagement implements AdminManagementInterface
{
    /**
     * @var UserFactory
     */
    protected $userFactory;

    public function __construct(UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
    }

    /**
     * @inheritdoc
     */
    public function getAdminById($adminId)
    {
        $user = $this->userFactory->create()->load($adminId);
        if (!$user->getId()) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(
                __("Admin user with ID %1 does not exist.", $adminId)
            );
        }
        return $user->getData(); // return as array (safe for API response)
    }
}
