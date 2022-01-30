<?php

declare(strict_types=1);
require_once('C:\xampp\htdocs\wordpress_multisite\wp-content\plugins\po\Shortcodes\OrderShortcode.php');
require_once('C:\xampp\htdocs\wordpress_multisite\wp-content\plugins\po\Controller.php');

use PHPUnit\Framework\TestCase;
use src\Shortcodes\OrderShortcode;
use src\Controller;

final class OrderTest extends TestCase
{
    public function testPriceCheck0Price(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->canOrder(0, 0)
        ));
    }

    public function testPriceCheck1Price(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->canOrder(0, 101)
        ));
    }

    public function testPriceCheck2Price(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->canOrder(1, 101)
        ));
    }

    public function testPriceCheck3Price(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->canOrder(1, 50.5)
        ));
    }

    public function testValidateSummary1(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validatePrice(150)
        ));
    }

    public function testValidateSummary2(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validatePrice(-2)
        ));
    }

    public function testValidateSummary3(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateWeight(150)
        ));
    }

    public function testValidateSummary4(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateWeight(30)
        ));
    }

    public function testValidateSummary5(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validatePrice(-50)
        ));
    }
    public function testValidateSummary6(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateProducts(['1' => 1])
        ));
    }

    public function testValidateSummary7(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateProducts(null)
        ));
    }

    public function testValidateSummary8(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateProducts([])
        ));
    }

    public function testValidateUser0(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateUser(0, ['name' => 'Bartek', 'surname' => 'Mazur'])
        ));
    }

    public function testValidateUser1(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateUser(0, [])
        ));
    }

    public function testValidateUser2(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateUser(1, ['name' => 'Bartek', 'surname' => 'Mazur'])
        ));
    }

    public function testValidateUser3(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateUser(1, ['name' => 'Bartek'])
        ));
    }

    public function testValidateUser4(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateUser(1, ['surname' => 'Bartek'])
        ));
    }

    public function testValidateUser5(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateUser(1, [])
        ));
    }

    public function testValidateDeliverer0(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateDeliverer([])
        ));
    }
    public function testValidateDeliverer1(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateDeliverer([['1' => 1]])
        ));
    }

    public function testValidateNip0(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateNip('111-22-33-444')
        ));
    }
    public function testValidateNip1(): void
    {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateNip('111-222-33-44')
        ));
    }

    public function testValidateNip2(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateNip('111-222-33-440')
        ));
    }
    public function testValidateNip3(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateNip('111-22-33-4400')
        ));
    }
    public function testValidateNip4(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateNip('')
        ));
    }
    public function testValidateNip5(): void
    {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateNip(null)
        ));
    }

    public function testValidateCity0() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateCity(null)
        ));
    }

    public function testValidateCity1() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateCity('')
        ));
    }

    public function testValidateCity2() {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateCity('Wrocław')
        ));
    }

    public function testValidateStreet0() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateStreet(null)
        ));
    }

    public function testValidateStreet1() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateStreet('')
        ));
    }

    public function testValidateStreet2() {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateStreet('Komandorska')
        ));
    }

    public function testValidateBuilding0() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateBuilding(null)
        ));
    }

    public function testValidateBuilding1() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validateBuilding('')
        ));
    }

    public function testValidateBuilding2() {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validateBuilding('24A')
        ));
    }

    public function testValidatePostalCode0() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validatePostalCode(null)
        ));
    }

    public function testValidatePostalCode1() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validatePostalCode('')
        ));
    }

    public function testValidatePostalCode2() {
        $order = new OrderShortcode();
        $this->assertTrue(($order->validatePostalCode('59-400')
        ));
    }

    public function testValidatePostalCode3() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validatePostalCode('590-40')
        ));
    }

    public function testValidatePostalCode4() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validatePostalCode('590-400')
        ));
    }

    public function testValidatePostalCode5() {
        $order = new OrderShortcode();
        $this->assertFalse(($order->validatePostalCode('59400')
        ));
    }
}
