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

class RSAKey implements \Serializable
{
    private $_p;

    private $_q;

    private $_n;

    private $_t;

    private $_e;

    private $_d;

    private function __construct()
    {

    }

    public function getLength()
    {
        return strlen(gmp_export($this->_n));
    }

    public static function generate(): RSAKey
    {
        $key = new self();

        do {
            $key->_p = gmp_nextprime(gmp_random(32));
            $key->_q = gmp_nextprime(gmp_random(32));
        } while (gmp_cmp($key->_p, $key->_q) === 0);

        $key->_n = gmp_mul($key->_p, $key->_q);

        $pm1 = gmp_sub($key->_p, 1);
        $qm1 = gmp_sub($key->_q, 1);

        $key->_t = gmp_div(gmp_mul($pm1, $qm1), gmp_gcd($pm1, $qm1));

        $e = 16;

        do {
            $key->_e = gmp_init(pow(2, $e) + 1);
            $e++;
        } while (gmp_intval(gmp_gcd($key->_e, $key->_t)) !== 1);

        $key->_d = gmp_invert($key->_e, $key->_t);

        var_dump($c = gmp_powm("50", $key->_e, $key->_n));
        var_dump(gmp_powm($c, $key->_d, $key->_n));

        return $key;
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
}