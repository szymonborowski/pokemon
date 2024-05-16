<?php

/**
 * file: ResourceType.php
 *
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\ValueObject\Request;

/**
 * Class ResourceType
 *
 * @package Szybo\Pokemon\ValueObject\Request
 */
enum ResourceType {
    case POKEMON;
    case ABILITY;

    case MOVE;
}
