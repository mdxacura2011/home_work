<?php
namespace Training\Test\App;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterListInterface;
use \Magento\Framework\App\ResponseInterface;

class FrontController extends \Magento\Framework\App\FrontController
{
    private $_logger;

    public function __construct(
        RouterListInterface $routerList,
        ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->_logger = $logger;
        parent::__construct($routerList, $response);
    }

    public function dispatch(RequestInterface $request)
    {
        foreach ($this->_routerList as $router) {
            $this->_logger->info(get_class($router));
        }
        return parent::dispatch($request);
    }
}