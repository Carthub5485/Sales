<?php

namespace Carthub\Sales\Observer;


class SetIsVipAttribute implements \Magento\Framework\Event\ObserverInterface
{
    protected $productRepository;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Catalog\Model\ProductRepository $productRepository
    ) {
        $this->logger = $logger;
        $this->productRepository = $productRepository;
    }
    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var \Magento\Sales\Model\Order $order */
        $order = $observer->getData('order');
        $order->SetIsVipAttribute(1);
        $order->save();
    }
}
