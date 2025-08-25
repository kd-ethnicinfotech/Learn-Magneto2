<?php
namespace Codilar\Demo\Helper;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Pricing\Helper\Data;
use Magento\Catalog\Model\Product;

class ProductHelper
{
    private $priceHelper;
    
    public function __construct(
        Data $priceHelper
    ) {
        $this->priceHelper = $priceHelper;
    }

    public function formatPrice($price)
    {
        return $this->priceHelper->currency($price, true, false);
    }

     /**
      * Get image URLs from a product
      *
      * @param  Product $product
      * @return array
      */
    public function getImageArray(Product $product)
    {
        $images = $product->getMediaGalleryImages(); // ✅ correct method
        $imageArray = [];

        if ($images) {
            foreach ($images as $img) {
                $imageArray[] = $img->getUrl();
            }
        }

        // fallback if no gallery images
        if (empty($imageArray) && $product->getImage()) {
             $imageArray[] = $product->getMediaConfig()->getMediaUrl($product->getImage());
        }

        return $imageArray;
    }
}
