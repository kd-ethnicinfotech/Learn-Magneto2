<?php
namespace Codilar\Demo\Api;

interface CustomerManagementInterface
{
  

    /**
     * Get list of customers
     *
     * @api
     * @return \Magento\Customer\Api\Data\CustomerSearchResultsInterface
     */
    public function getList();


    /**
     * Get customer information by ID
     *
     * @api
     * @param int $customerId
     * @return \Magento\Customer\Api\Data\CustomerInterface
     */
    public function getCustomerById($customerId);

    
}
