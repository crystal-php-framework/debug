<?php
declare(strict_types=1);
/**
 * Debugging could not be easy without the awesome crystal debugging component.
 *
 * @author  Nicholas English <isupozoy@gmail.com>.
 * @license <https://github.com/crystal-php-framework/debug/blob/master/LICENSE> MIT License.
 * @link    <https://github.com/crystal-php-framework/debug> Source Code.
 */

namespace Crystal\Debug\Exception;

use InvalidArgumentException;

/**
 * This exception is thrown when an unknown handler is passed.
 */
class HandlerNotRecognizedException extends InvalidArgumentException implements ExceptionInterface
{
}
