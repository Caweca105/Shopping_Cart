<?php

require_once "Product.php";
require_once "Cart.php";
require_once "CartItem.php";

$product1 = new Product(1, "iphone 11", 2500, 10);
$product2 = new Product(2, "M.2 SSD", 400, 10);
$product3 = new Product(3, "Samsung Galaxy S20", 3200, 10);

$cart = new Cart();

$cartItem1 = $cart->addProduct($product1, 1);
$cartItem2 = $product2->addProduct($product2, 2);

echo "Number of items in cart: ".PHP_EOL;
echo $cart->getTotalQuantity().PHP_EOL; // prints 2
echo "Total price of items in cart: ".PHP_EOL;
echo $cart->getToTalSum().PHP_EOL; // prints 2900

$cartItem2->increaseQuantity();
$cartItem2->decreaseQuantity();

echo "Number of items in cart: ".PHP_EOL;
echo $cart->getTotalQuantity().PHP_EOL; // prints 4

echo "Total price of items in cart: ".PHP_EOL;
echo $cart->getTotalSum().PHP_EOL; // prints 3700

$cart->removeProduct($product1);

echo "Number of items in cart: ".PHP_EOL;
echo $cart->getTotalQuantity().PHP_EOL; // prints 4

echo "Total price of items in cart: ".PHP_EOL;
echo $cart->getTotalSum().PHP_EOL; // prints 3700