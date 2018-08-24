<?php
declare(strict_types=1);
/**
 * Debugging component from crystal framework.
 *
 * @author  Nicholas English <isupozoy@gmail.com>.
 * @license <https://github.com/crystal-php-framework/debug/blob/master/LICENSE> MIT License.
 * @link    <https://github.com/crystal-php-framework/debug> Source Code.
 */

namespace Crystal\Debug;

use Symfony\Component\OptionsResolver\OptionsResolver;

use const null;

use function set_exception_handler;
use function set_error_handler;
use function error_reporting;
use function ini_set;

/**
 * The main debugging controller.
 */
class Debugger implements DebuggerInterface
{

    /** @var array The basic prooduction settings. */
    private $basicProdConfig = [
        'display_startup_errors' => 0
        'display_errors' = 0
    ];

    /** @var array The basic development settings. */
    private $basicDevConfig = [
        'display_startup_errors' => 1
        'display_errors' = 1
    ];

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
        $this->exceptionHandler = $exceptionHandler;
        $this->errorHandler     = $errorHandler;
    }

    /**
     * Allows you to change the internel php configuration.
     *
     * @param array $settings An array of internal php configuration settings to change.
     *
     * @return void Returns nothing.
     */
    public function setConfig(array $settings = []): void
    {
        foreach ($settings as $setting => $value) {
            if (!ini_set($setting, $value)) {
                throw new Exception\RuntimeException('The current setting change could not be done.');
            }
        }
    }

    /**
     * Run basic development or production operations.
     *
     * @param string $env The environemt the system should run under.
     *
     * @return void Returns nothing.
     */
    public function run($env = 'production'): void
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults([
            'env' => 'production'
        ]);
        $resolver->setAllowedValues('env', [
            'production',
            'development'
        ]);
        $env = $resolver->resolve($env);
        if ($env === 'production') {
            $this->setConfig($this->basicProdConfig);
            error_reporting(E_ALL);
        } else {
            $this->setConfig($this->basicDevConfig);
            error_reporting(0);
        }
    }

    /**
     * Process any handlers present.
     *
     * @return void Returns nothing.
     */
    public function processHandler(): void
    {
        if (!is_null($this->exceptionHandler)) {
            set_exception_handler($this->exceptionHandler->getCallable());
        }
        if (!is_null($this->errorHandler)) {
            set_error_handler($this->errorHandler->getCallable());
        }
    }
}
