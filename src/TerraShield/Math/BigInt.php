<?php

/**
 * TerraShield - Common security tools for PHP
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @category  Library
 * @package   TerraShield
 * @author    Axel Nana <ax.lnana@outlook.com>
 * @copyright 2018 Aliens Group, Inc.
 * @license   MIT <https://github.com/ElementaryFramework/TerraShield/blob/master/LICENSE>
 * @version   0.0.1
 * @link      http://terrashield.na2axl.tk
 */

namespace ElementaryFramework\TerraShield\Math;


use ElementaryFramework\TerraShield\Exceptions\NotImplementedException;
use ElementaryFramework\TerraShield\Math\Implementations\BigIntGMPImplementation;

class BigInt implements IBigInt
{
    /**
     * A BigInt implementation
     *
     * @var IBigInt
     */
    private $_bigIntImplementation;

    /**
     * BigInt constructor.
     *
     * @param string|int|BigInt $value
     *
     * @throws NotImplementedException
     */
    public function __construct($value)
    {
        $this->_bigIntImplementation = self::_chooseImplementation();

        if (is_string($value) || is_int($value)) {
            $this->_bigIntImplementation->setValue($value);
        } elseif ($value instanceof IBigInt) {
            $this->_bigIntImplementation = clone $value;
        }
    }

    /**
     * Choose an implementation of IBigInt between
     * available extensions.
     *
     * This function perform checks in this order
     * - GMP
     * - BCMath
     *
     * @return IBigInt
     *
     * @throws NotImplementedException
     */
    private static function _chooseImplementation(): IBigInt
    {
        if (extension_loaded("gmp")) {
            return new BigIntGMPImplementation();
        } elseif (extension_loaded("bcmath")) {
            // TODO: BCMath implementation
        }

        throw new NotImplementedException(
            "Unable to find an implementation of BigInt with your configuration of PHP. " .
            "Please make sure you have either the GMP (recommended) or the BCMath extension enabled."
        );
    }

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    /**
     * String representation of the big integer.
     *
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    /**
     * Sets the big integer value.
     *
     * @param string|int $value The value to set.
     */
    public function setValue($value)
    {
        // TODO: Implement setValue() method.
    }

    /**
     * Gets the big integer value as string.
     *
     * @return string
     */
    public function getValue()
    {
        // TODO: Implement getValue() method.
    }

    /**
     * Adds a value to the current big integer.
     *
     * @param string|int|IBigInt $value The value to add.
     */
    public function addTo($value)
    {
        // TODO: Implement add() method.
    }

    /**
     * Subtracts a value to the current big integer.
     *
     * @param string|int|IBigInt $value The value to subtract.
     */
    public function subBy($value)
    {
        // TODO: Implement sub() method.
    }

    /**
     * Multiplies a value to the current big integer.
     *
     * @param string|int|IBigInt $value The value to multiply.
     */
    public function mulBy($value)
    {
        // TODO: Implement mul() method.
    }

    /**
     * Divides the current big integer by a value.
     *
     * @param string|int|IBigInt $value The value to divide by.
     */
    public function divBy($value)
    {
        // TODO: Implement div() method.
    }

    /**
     * Computes the modulus.
     *
     * @param string|int|IBigInt $modulo The modulo
     */
    public function modBy($modulo)
    {
        // TODO: Implement mod() method.
    }

    /**
     * Negates this big integer.
     */
    public function negate()
    {
        // TODO: Implement negate() method.
    }

    /**
     * Checks if this big integer is prime.
     *
     * @return bool
     */
    public function isPrime(): bool
    {
        // TODO: Implement isPrime() method.
    }

    /**
     * Checks if this big integer is equal
     * to $b.
     *
     * @param string|int|IBigInt $b The value to compare to.
     *
     * @return bool
     */
    public function equals($b): bool
    {
        // TODO: Implement equals() method.
    }

    /**
     * Checks if this big integer is greater
     * than $b.
     *
     * @param string|int|IBigInt $b The value to compare to.
     *
     * @return bool
     */
    public function greaterThan($b): bool
    {
        // TODO: Implement greaterThan() method.
    }

    /**
     * Checks if this big integer is lower
     * than $b.
     *
     * @param string|int|IBigInt $b The value to compare to.
     *
     * @return bool
     */
    public function lowerThan($b): bool
    {
        // TODO: Implement lowerThan() method.
    }

    /**
     * Sets the seed for random integer generation.
     *
     * @param string|int|IBigInt $seed
     */
    public static function setRandomSeed($seed)
    {
        // TODO: Implement setRandomSeed() method.
    }

    public static function random($limit)
    {
        // TODO: Implement random() method.
    }

    public static function randomRange($min, $max)
    {
        // TODO: Implement randomRange() method.
    }

    /**
     * Divides the current big integer by a value
     * and get the quotient and the remainder.
     *
     * @param string|int|IBigInt $value The value to divide by.
     *
     * @return IBigInt[]
     */
    public function divQR($value): array
    {
        // TODO: Implement divQR() method.
    }

    /**
     * Divides the current big integer by a value
     * and get the quotient.
     *
     * @param string|int|IBigInt $value The value to divide by.
     *
     * @return IBigInt
     */
    public function divQ($value): IBigInt
    {
        // TODO: Implement divQ() method.
    }

    /**
     * Divides the current big integer by a value
     * and get the remainder.
     *
     * @param string|int|IBigInt $value The value to divide by.
     *
     * @return IBigInt
     */
    public function divR($value): IBigInt
    {
        // TODO: Implement divR() method.
    }

    /**
     * Computes the absolute value of a big integer.
     *
     * @param string|int|IBigInt $value The value.
     */
    public static function abs(IBigInt $value)
    {
        // TODO: Implement abs() method.
    }

    public static function fact(IBigInt $value)
    {
        // TODO: Implement fact() method.
    }

    public static function sqrt(IBigInt $value)
    {
        // TODO: Implement sqrt() method.
    }

    public static function pow(IBigInt $value, int $exponent)
    {
        // TODO: Implement pow() method.
    }

    public static function powm(IBigInt $value, int $exponent, IBigInt $modulo)
    {
        // TODO: Implement powm() method.
    }

    static function gcd(IBigInt $a, IBigInt $b)
    {
        // TODO: Implement gcd() method.
    }

    static function lcd(IBigInt $a, IBigInt $b)
    {
        // TODO: Implement lcd() method.
    }

    static function inverseModulo(IBigInt $a, IBigInt $b)
    {
        // TODO: Implement inverseModulo() method.
    }

    static function compare(IBigInt $a, IBigInt $b)
    {
        // TODO: Implement compare() method.
    }

    /**
     * Gets the value as bytes.
     */
    public function toBytes()
    {
        // TODO: Implement toBytes() method.
    }

    public static function fromBytes($bytes): IBigInt
    {
        // TODO: Implement fromBytes() method.
    }
}