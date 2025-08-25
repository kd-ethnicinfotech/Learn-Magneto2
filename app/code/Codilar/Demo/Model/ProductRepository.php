<?php
namespace Codilar\Demo\Model;

use Codilar\Demo\Api\ProductRepositoryInterface;
use Codilar\Demo\Api\Data\ProductInterface;
use Codilar\Demo\Model\Data\ProductFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Catalog\Api\ProductRepositoryInterface as MagentoProductRepository;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use Codilar\Demo\Helper\ProductHelper;


class ProductRepository implements ProductRepositoryInterface
{
    private $productFactory;
    private $productRepository;

    private $productCollectionFactory;

    private $productHelper;

    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        ProductFactory $productFactory,
        ProductHelper $productHelper,
        ProductCollectionFactory $productCollectionFactory
    ) { 
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
        $this->productHelper = $productHelper;
        $this->productCollectionFactory = $productCollectionFactory;
    }

    public function getProductById($id)
    {
        try {
            $product = $this->productRepository->getById($id);

            $productInterface = $this->productFactory->create();
            $productInterface->setId($product->getId());
            $productInterface->setSku($product->getSku());
            $productInterface->setName($product->getName());
            $productInterface->setPrice($this->productHelper->formatPrice($product->getPrice()));
            $productInterface->setImage($this->productHelper->getImageArray($product));

            return $productInterface;
        } catch (NoSuchEntityException $e) {
            throw NoSuchEntityException::singleField("id", $id);
        }
    }
    public function getList()
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*'); // load all attributes

        $products = [];
        foreach ($collection as $product) {
            $productInterface = $this->productFactory->create();
            $productInterface->setId($product->getId());
            $productInterface->setSku($product->getSku());
            $productInterface->setName($product->getName());
            $productInterface->setPrice($this->productHelper->formatPrice($product->getPrice()));
            $productInterface->setImage($this->productHelper->getImageArray($product));



            // you can add more setters here later, like setSku(), setName(), etc.
            $products[] = $productInterface;
        }

        return $products;
    }
}


// namespace Codilar\Demo\Model;


// use Codilar\Demo\Api\ProductRepositoryInterface;
// use Codilar\Demo\Api\Data\ProductInterface;
// // use Codilar\Demo\Helper\ProductHelper;
// use Codilar\Demo\Model\Data\Product;
// use Magento\Framework\Exception\NoSuchEntityException;

// class ProductRepository implements ProductRepositoryInterface
// {
//     private $Product;

//     // private $productHelper;

//     private $productRepository;

//     public function __construct(
//         \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
//         Product $Product
//     ) { 
//         $this->Product = $Product;
//         // $this->productHelper = $productHelper;
//         $this->productRepository = $productRepository;
//     }
//     public function getProductById($id)
//     {
//         $Product = $this->Product->create();

//         try{
            
//             $product = $this->productRepository->getById($id);
//             $Product->setId($product->getId());
//             return $Product;
//         }catch(NoSuchEntityException $e){
//             throw NoSuchEntityException::singleField("id", $id);

//         }

//     }
// }



// namespace Codilar\Demo\Model;

// use Codilar\Demo\Api\ProductRepositoryInterface;
// use Codilar\Demo\Api\Data\Product;
// use Codilar\Demo\Helper\ProductHelper;
// use Magento\Framework\Exception\NoSuchEntityException;

// class ProductRepository implements ProductRepositoryInterface
// {
//     private $Product;

//     private $productHelper;

//     private $productRepository;

//     public function __construct(
//         \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
//         Product $Product,
//         ProductHelper $productHelper
//     ) { 
//         $this->Product = $Product;
//         $this->productHelper = $productHelper;
//         $this->productRepository = $productRepository;
//     }

//     public function getProductById($id)
//     {
//         $Product = $this->Product->create();

//         try {
//             $product = $this->productRepository->getById($id);
//             $Product->setId($product->getId()); // fixed line
//             return $Product;
//         } catch (NoSuchEntityException $e) {
//             throw NoSuchEntityException::singleField("id", $id);
//         }
//     }
// }
