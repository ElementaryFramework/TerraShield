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

namespace ElementaryFramework\TerraShield\Math\Implementations;


use ElementaryFramework\TerraShield\Exceptions\InvalidValueException;
use ElementaryFramework\TerraShield\Math\IBigInt;

class BigIntGMPImplementation implements IBigInt
{

    /**
     * The internal manage value.
     *
     * @var \GMP
     */
    private $_value;

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
     * IBigInt constructor.
     *
     * @param string|int|IBigInt $value The big integer initial value.
     */
    public function __construct($value = 0)
    {
        $this->setValue($value);
    }

    /**
     * String representation of the big integer.
     *
     * @return string
     */
    public function __toString()
    {
        return gmp_strval($this->_value);
    }

    /**
     * Sets the big integer value.
     *
     * @param string|int $value The value to set.
     */
    public function setValue($value)
    {
        if ($value instanceof IBigInt) {
            $this->_value = gmp_init($value->getValue());
        } else {
            $this->_value = gmp_init($value);
        }
    }

    /**
     * Gets the big integer value as string.
     *
     * @return string
     */
    public function getValue()
    {
        return gmp_strval($this->_value);
    }

    /**
     * Adds a value to the current big integer.
     *
     * @param string|int|IBigInt $value The value to add.
     */
    public function addTo($value)
    {
        $this->_value = gmp_add($this->_value, $value);
    }

    /**
     * Subtracts a value to the current big integer.
     *
     * @param string|int|IBigInt $value The value to subtract.
     */
    public function subBy($value)
    {
        $this->_value = gmp_sub($this->_value, $value);
    }

    /**
     * Multiplies a value to the current big integer.
     *
     * @param string|int|IBigInt $value The value to multiply.
     */
    public function mulBy($value)
    {
        $this->_value = gmp_mul($this->_value, $value);
    }

    /**
     * Divides the current big integer by a value.
     *
     * @param string|int|IBigInt $value The value to divide by.
     */
    public function divBy($value)
    {
        $this->_value = gmp_div($this->_value, $value);
    }

    /**
     * Computes the modulus.
     *
     * @param string|int|IBigInt $modulo The modulo
     */
    public function modBy($modulo)
    {
        $this->_value = gmp_mod($this->_value, $modulo);
    }

    /**
     * Negates this big integer.
     */
    public function negate()
    {
        $this->_value = gmp_neg($this->_value);
    }

    /**
     * Checks if this big integer is prime.
     *
     * @return bool
     */
    public function isPrime(): bool
    {
        return gmp_prob_prime($this->_value) > 0;
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
        return gmp_cmp($this->_value, $b) === 0;
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
        return gmp_cmp($this->_value, $b) > 0;
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
        return gmp_cmp($this->_value, $b) < 0;
    }

    /**
     * Sets the seed for random integer generation.
     *
     * @param string|int|IBigInt $seed
     */
    public static function setRandomSeed($seed)
    {
        gmp_random_seed($seed);
    }

    public static function random($limit)
    {
        return gmp_random($limit);
    }

    public static function randomRange($min, $max)
    {
        return gmp_random_range($min, $max);
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
        return gmp_div_qr($this->_value, gmp_init($value));
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
        return gmp_div_q($this->_value, gmp_init($value));
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
        return gmp_div_r($this->_value, gmp_init($value));
    }

    /**
     * Computes the absolute value of a big integer.
     *
     * @param string|int|IBigInt $value The value.
     * @return IBigInt
     * @throws InvalidValueException
     */
    public static function abs(IBigInt $value)
    {
        if ($value instanceof BigIntGMPImplementation) {
            return new BigIntGMPImplementation(gmp_abs($value->getValue()));
        } else {
            throw new InvalidValueException("The value is not valid for this implementation");
        }
    }

    /**
     * @param $value
     * @return BigIntGMPImplementation
     * @throws InvalidValueException
     */
    public static function fact(IBigInt $value)
    {
        if ($value instanceof BigIntGMPImplementation) {
            return new BigIntGMPImplementation(gmp_fact($value->getValue()));
        } else {
            throw new InvalidValueException("The value is not valid for this implementation");
        }
    }

    /**
     * @param $value
     * @return BigIntGMPImplementation
     * @throws InvalidValueException
     */
    public static function sqrt(IBigInt $value)
    {
        if ($value instanceof BigIntGMPImplementation) {
            return new BigIntGMPImplementation(gmp_sqrt($value->getValue()));
        } else {
            throw new InvalidValueException("The value is not valid for this implmentation");
        }
    }

    /**
     * @param IBigInt $value
     * @param int $exponent
     * @return BigIntGMPImplementation
     * @throws InvalidValueException
     */
    public static function pow(IBigInt $value, int $exponent)
    {
        if ($value instanceof BigIntGMPImplementation) {
            return new BigIntGMPImplementation(gmp_pow($value->getValue(), $exponent));
        } else {
            throw new InvalidValueException("The value is not valid for this implementation");
        }
    }

    /**
     * @param IBigInt $value
     * @param int $exponent
     * @param IBigInt $modulo
     * @return BigIntGMPImplementation
     * @throws InvalidValueException
     */
    public static function powm(IBigInt $value, int $exponent, IBigInt $modulo)
    {
        if ($value instanceof BigIntGMPImplementation) {
            return new BigIntGMPImplementation(gmp_powm($value->getValue(), $exponent, $modulo->getValue()));
        } else {
            throw new InvalidValueException("The value is not valid for this implementation");
        }
    }

    /**
     * @param IBigInt $a
     * @param IBigInt $b
     * @return BigIntGMPImplementation
     * @throws InvalidValueException
     */
    static function gcd(IBigInt $a, IBigInt $b)
    {
        if ($a instanceof BigIntGMPImplementation && $b instanceof BigIntGMPImplementation) {
            return new BigIntGMPImplementation(gmp_gcd($a->getValue(), $b->getValue()));
        } else {
            throw new InvalidValueException("The value is not valid for this implementation");
        }
    }

    /**
     * @param IBigInt $a
     * @param IBigInt $b
     * @throws InvalidValueException
     */
    static function lcd(IBigInt $a, IBigInt $b)
    {
        if ($a instanceof BigIntGMPImplementation && $b instanceof BigIntGMPImplementation) {
            $gcp = self::gcd($a, $b);
            // TODO: $prd =
        } else {
            throw new InvalidValueException("The value is not valid for this implementation");
        }
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
        return gmp_export($this->_value);
    }

    /**
     * @param $bytes
     * @return IBigInt
     * @throws InvalidValueException
     */
    public static function fromBytes($bytes): IBigInt
    {
        $value = gmp_import($bytes);

        if ($value !== false) {
            return new self($value);
        }

        throw new InvalidValueException("Unable to convert bytes to big integer.");
    }
}