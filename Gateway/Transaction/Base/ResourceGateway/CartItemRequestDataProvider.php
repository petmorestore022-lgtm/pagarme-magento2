<?php
/**
 * Class CartItemRequestDataProvider
 *
 * @author      Open Source Team
 * @copyright   2021 Pagar.me (https://pagar.me)
 * @license     https://pagar.me Copyright
 *
 * @link        https://pagar.me
 */

namespace Pagarme\Pagarme\Gateway\Transaction\Base\ResourceGateway;


use Magento\Sales\Model\Order\Item;
use Pagarme\Pagarme\Api\CartItemRequestDataProviderInterface;

class CartItemRequestDataProvider implements CartItemRequestDataProviderInterface
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->getItem()->getDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function getItemReference()
    {
        return $this->getItem()->getSku();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getItem()->getName();

    }

    /**
     * {@inheritdoc}
     */
    public function getQuantity()
    {
        return $this->getItem()->getQtyOrdered();

    }

    /**
     * {@inheritdoc}
     */
    public function getUnitCostInCents()
    {
        return $this->getItem()->getProduct()->getFinalPrice() * 100;
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalCostInCents()
    {
        return $this->getUnitCostInCents() * $this->getQuantity();
    }

    /**
     * @return Item
     */
    protected function getItem()
    {
        return $this->item;
    }

    /**
     * @param Item $item
     * @return self
     */
    protected function setItem(Item $item)
    {
        $this->item = $item;
        return $this;
    }
}
