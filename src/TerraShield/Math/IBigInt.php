<?php

namespace ElementaryFramework\TerraShield\Math;

interface IBigInt extends \Serializable
{
    /**
     * IBigInt constructor.
     *
     * @param string|int|IBigInt $value The big integer initial value.
     */
    public function __construct($value);

    /**
     * String representation of the big integer.
     *
     * @return string
     */
    public function __toString();

    /**
     * Sets the big integer value.
     *
     * @param string|int $value The value to set.
     */
    public function setValue($value);

    /**
     * Gets the big integer value as string.
     * 
     * @return string
     */
    public function getValue();
    
    /**
     * Adds a value to the current big integer.
     * 
     * @param string|int|IBigInt $value The value to add.
     */
    public function addTo($value);

    /**
     * Subtracts a value to the current big integer.
     *
     * @param string|int|IBigInt $value The value to subtract.
     */
    public function subBy($value);

    /**
     * Multiplies a value to the current big integer.
     *
     * @param string|int|IBigInt $value The value to multiply.
     */
    public function mulBy($value);

    /**
     * Divides the current big integer by a value.
     *
     * @param string|int|IBigInt $value The value to divide by.
     */
    public function divBy($value);

    /**
     * Computes the modulus.
     *
     * @param string|int|IBigInt $modulo The modulo
     */
    public function modBy($modulo);

    /**
     * Gets the value as bytes.
     */
    public function toBytes();

    /**
     * Negates this big integer.
     */
    public function negate();

    /**
     * Checks if this big integer is prime.
     *
     * @return bool
     */
    public function isPrime(): bool ;

    /**
     * Checks if this big integer is equal
     * to $b.
     *
     * @param string|int|IBigInt $b The value to compare to.
     *
     * @return bool
     */
    public function equals($b): bool;

    /**
     * Checks if this big integer is greater
     * than $b.
     *
     * @param string|int|IBigInt $b The value to compare to.
     *
     * @return bool
     */
    public function greaterThan($b): bool;

    /**
     * Checks if this big integer is lower
     * than $b.
     *
     * @param string|int|IBigInt $b The value to compare to.
     *
     * @return bool
     */
    public function lowerThan($b): bool;

    public static function fromBytes($bytes): IBigInt;

    /**
     * Sets the seed for random integer generation.
     *
     * @param string|int|IBigInt $seed
     */
    public static function setRandomSeed($seed);

    public static function random($limit);

    public static function randomRange($min, $max);

    /**
     * Divides the current big integer by a value
     * and get the quotient and the remainder.
     *
     * @param string|int|IBigInt $value The value to divide by.
     *
     * @return IBigInt[]
     */
    public function divQR($value): array;

    /**
     * Divides the current big integer by a value
     * and get the quotient.
     *
     * @param string|int|IBigInt $value The value to divide by.
     *
     * @return IBigInt
     */
    public function divQ($value): IBigInt;

    /**
     * Divides the current big integer by a value
     * and get the remainder.
     *
     * @param string|int|IBigInt $value The value to divide by.
     *
     * @return IBigInt
     */
    public function divR($value): IBigInt;

    /**
     * Computes the absolute value of a big integer.
     *
     * @param string|int|IBigInt $value The value.
     */
    public static function abs(IBigInt $value);

    public static function fact(IBigInt $value);

    public static function sqrt(IBigInt $value);

    public static function pow(IBigInt $value, int $exponent);

    public static function powm(IBigInt $value, int $exponent, IBigInt $modulo);

    public static function gcd(IBigInt $a, IBigInt $b);

    public static function lcd(IBigInt $a, IBigInt $b);

    public static function inverseModulo(IBigInt $a, IBigInt $b);

    public static function compare(IBigInt $a, IBigInt $b);
}