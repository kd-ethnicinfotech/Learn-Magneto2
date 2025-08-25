<?php
namespace Demo\Custom\Block;

use Magento\Framework\View\Element\Template;

class Article extends Template
{
    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Sample function to return string (for testing)
     *
     * @return string
     */
    public function getArticles()
    {
        
        return 'getArticles function of the Block class called successfully';
    }
}
