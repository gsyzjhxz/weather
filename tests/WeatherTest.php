<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2019/6/25
 * Time: 11:37
 */

namespace Overtrue\Weather\Tests;

use Overtrue\Weather\Exceptions\InvalidArgumentException;
use Overtrue\Weather\Weather;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    public function testGetWeatherWithInvalidType()
    {
        $w = new Weather('52397aafd7b562d599e01848877f7aee');

        // 断言会抛出此异常类
        $this->expectException(InvalidArgumentException::class);

        // 断言异常消息为 'Invalid type value(base/all): foo'
        $this->expectExceptionMessage('Invalid type value(base/all): foo');

        $w->getWeather('深圳', 'foo');

        $this->fail('Failed to assert getWeather throw exception with invalid argument.');
    }

    // 检查 $format 参数
    public function testGetWeatherWithInvalidFormat()
    {
        $w = new Weather('52397aafd7b562d599e01848877f7aee');

        // 断言会抛出此异常类
        $this->expectException(InvalidArgumentException::class);

        // 断言异常消息为 'Invalid response format: array'
        $this->expectExceptionMessage('Invalid response format: array');

        // 因为支持的格式为 xml/json，所以传入 array 会抛出异常
        $w->getWeather('深圳', 'base', 'array');

        // 如果没有抛出异常，就会运行到这行，标记当前测试没成功
        $this->fail('Failed to assert getWeather throw exception with invalid argument.');
    }

}