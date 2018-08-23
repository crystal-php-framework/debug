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

use const null;

/**
 * The main debugging controller.
 */
class Debugger implements DebuggerInterface
{

    /** @var ExceptionHandlerInterface The exception handler. */
    private $exceptionHandler;
    
    /** @var ErrorHandlerInterface The error handler. */
    private $errorHandler;

    /**
     * Construct a new debugging controller.
     *
     * @param ExceptionHandlerInterface $exceptionHandler The exception handler.
     * @param ErrorHandlerInterface     $errorHandler     The error handler.
     *
     * @return void Returns nothing.
     */
    public function __construct(ExceptionHandlerInterface $exceptionHandler = null, ErrorHandlerInterface $errorHandler = null)
    {
        if (!is_null($exceptionHandler))
        {
            $this->exceptionHandler = $exceptionHandler;
        }
        if (!is_null($errorHandler))
        {
            $this->errorHandler = $errorHandler;
        }
    }
}
