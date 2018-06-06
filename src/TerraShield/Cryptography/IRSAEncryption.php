<?php
/**
 * Created by PhpStorm.
 * User: axlna
 * Date: 23/05/2018
 * Time: 15:42
 */

namespace ElementaryFramework\TerraShield\Cryptography;


use ElementaryFramework\TerraShield\Cryptography\RSA\RSAKey;

interface IRSAEncryption extends \Serializable
{
    function encrypt($message, RSAKey $key);

    function decrypt($message, RSAKey $key);
}