<?php
namespace Codilar\Demo\Model;


use Codilar\Demo\Api\CustomerManagementInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;


class CustomerManagement implements CustomerManagementInterface
{
    protected $customerRepository;

    protected $searchCriteriaBuilder;

    public function __construct(CustomerRepositoryInterface $customerRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->customerRepository = $customerRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function getCustomerById($customerId)
    {
        return $this->customerRepository->getById($customerId);
    }
    public function getList()
    {
        // No filters → fetch all customers
        $searchCriteria = $this->searchCriteriaBuilder->create();
        return $this->customerRepository->getList($searchCriteria);
    }
    
}
