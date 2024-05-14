<?php

declare(strict_types=1);

/**
 * file: Action.php
 *
 * @author    Szymon Borowski <szymon@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\ValueObject\Request;

/**
 * Enum Method
 *
 * @package Szybo\Pokemon\ValueObject\Request
 */
enum Method: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
}
