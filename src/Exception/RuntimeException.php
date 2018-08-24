<?php
declare(strict_types=1);
/**
 * Debugging component from crystal framework.
 *
 * @author  Nicholas English <isupozoy@gmail.com>.
 * @license <https://github.com/crystal-php-framework/debug/blob/master/LICENSE> MIT License.
 * @link    <https://github.com/crystal-php-framework/debug> Source Code.
 */

namespace Crystal\Debug\Exception;

use RuntimeException;

/**
 * This exception is thrown when the debugger is not running properly.
 */
class RuntimeException extends RuntimeException implements ExceptionInterface
{
}
