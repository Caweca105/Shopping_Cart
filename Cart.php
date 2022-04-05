<?php

class Cart
{
    /**
     * @var CarItem[]
     */

    private array $items = [];

    /**
     * @return \CartItem[]
     */

    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param \CartItem[] $items
     */

    public function setItems()
    {
        return $this->items;
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * 
     * @param Product $product
     * @param int $quantity
     * @return \CartItem
     * @throws \Exception
     */

    public function addProduct(Product $product, int $quantity)
    {
        //find product in cart
        $cartItem = $this->findCartItem($product->getId());
        if($cartItem === null)
        {
            $cartItem = new CartItem($product, 0);
            $this->items[$product->getId()] = $cartItem;
        }
        $cartItem->increaseQuantity($quantity);
        return $cartItem;
    }

    private function findCartItem(int $productId)
    {
        return $this->items[$productId] ?? null;
    }

    /**
     * Remove product from cart
     * 
     * @param Product $product
     */
    private function removeProduct(Product $product)
    {
        unset($this->items[$product->getId()]);
    }

    /**
     * This returns total number of products added in cart
     * 
     * @return int
     */
    public function getTotalQuantity()
    {
        $sum = 0;
        foreach ($this->items as $items) {
            $sum += $item->getQuantity();
        }
        return $sum;
    }

    /**
     * This return total price of products added in cart
     * 
     * @return float
     */
    public function getTotalSum()
    {
        $totalSum = 0;
        foreach ($this->items as $items) {
            $totalSum += $item->getQuantity() * $item->getProduct()->getPrice();
        }
        return $totalSum;
    }
}