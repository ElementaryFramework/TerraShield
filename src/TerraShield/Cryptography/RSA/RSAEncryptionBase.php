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

 namespace ElementaryFramework\TerraShield\Cryptography\RSA;

use ElementaryFramework\TerraShield\Cryptography\IRSAEncryption;
use ElementaryFramework\TerraShield\Exceptions\InvalidValueException;
use ElementaryFramework\TerraShield\Math\BigInt;
use ElementaryFramework\TerraShield\Math\IBigInt;

abstract class RSAEncryptionBase implements IRSAEncryption
{
    public static function sign($message, RSAKey $key)
    {
    }

    public abstract function encrypt($message, RSAKey $key);

    public abstract function decrypt($message, RSAKey $key);

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
     * Integer-to-Octet-String primitive
     *
     * Converts a non negative integer to an octet
     * string of a specified length.
     *
     * @param string|int|IBigInt $x Non negative integer to be converted.
     * @param int $l Intended length of the resulting octet string.
     *
     * @return string
     *
     * @throws InvalidValueException
     */
    private function _i2osp($x, $l): string
    {
        $base = new BigInt(256);

        if (is_string($x) || is_int($x)) {
            $x = new BigInt($x);
        }

        if ($x instanceof IBigInt) {
            $max = BigInt::pow($base, $l);

            if ($x->greaterThan($max) || $x->equals($max)) {
                throw new InvalidValueException("Integer too large.");
            }

            $bytes = $x->toBytes();

            return str_pad($bytes, $l, chr(0), STR_PAD_LEFT);
        } else {
            throw new InvalidValueException();
        }
    }

    /**
     * Octet-String-to-Integer primitive
     *
     * Converts an octet string to a non negative integer.
     *
     * @param string $x Octet string to be converted.
     *
     * @return IBigInt
     */
    private function _os2ip($x): IBigInt
    {
        return BigInt::fromBytes($x);
    }
}