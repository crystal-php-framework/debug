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

/**
 * This exception is thrown when the requestion operation could not run.
 */
class InvalidOperationException extends RuntimeException implements ExceptionInterface
{
}
