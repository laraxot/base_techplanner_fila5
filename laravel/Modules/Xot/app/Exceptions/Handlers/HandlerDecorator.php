<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Handlers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
<<<<<<< HEAD
=======
use Throwable;
>>>>>>> 6ed19256f (.)

class HandlerDecorator implements ExceptionHandler
{
    protected HandlersRepository $repository;

    public function __construct(
        protected ExceptionHandler $defaultHandler,
        HandlersRepository $repository,
    ) {
        $this->repository = $repository;
    }

    public function __call(string $name, array $parameters): mixed
    {
        /** @var callable */
        $callable = [$this->defaultHandler, $name];

        return \call_user_func_array($callable, $parameters);
    }

<<<<<<< HEAD
    public function report(\Throwable $e): void
=======
    public function report(Throwable $e): void
>>>>>>> 6ed19256f (.)
    {
        foreach ($this->repository->getReportersByException($e) as $reporter) {
            if (is_callable($reporter)) {
                $reporter($e);
            }
        }

        $this->defaultHandler->report($e);
    }

<<<<<<< HEAD
    public function render($request, \Throwable $e): SymfonyResponse
=======
    public function render($request, Throwable $e): SymfonyResponse
>>>>>>> 6ed19256f (.)
    {
        foreach ($this->repository->getRenderersByException($e) as $renderer) {
            if (is_callable($renderer)) {
                $response = $renderer($e, $request);
                if ($response instanceof SymfonyResponse) {
                    return $response;
                }
            }
        }

        return $this->defaultHandler->render($request, $e);
    }

<<<<<<< HEAD
    public function renderForConsole($output, \Throwable $e): void
=======
    /**
     * @phpstan-ignore-next-line
     */
    public function renderForConsole($output, Throwable $e): void
>>>>>>> 6ed19256f (.)
    {
        foreach ($this->repository->getConsoleRenderersByException($e) as $renderer) {
            if (is_callable($renderer)) {
                $renderer($e, $output);
            }
        }

<<<<<<< HEAD
        $this->__call('renderForConsole', [$output, $e]);
=======
        /** @phpstan-ignore-next-line */
        $this->defaultHandler->renderForConsole($output, $e);
>>>>>>> 6ed19256f (.)
    }

    public function reporter(callable $reporter): int
    {
        return $this->repository->addReporter($reporter);
    }

    public function renderer(callable $renderer): int
    {
        return $this->repository->addRenderer($renderer);
    }

    public function consoleRenderer(callable $renderer): int
    {
        return $this->repository->addConsoleRenderer($renderer);
    }

<<<<<<< HEAD
    public function shouldReport(\Throwable $e): bool
=======
    public function shouldReport(Throwable $e): bool
>>>>>>> 6ed19256f (.)
    {
        return $this->defaultHandler->shouldReport($e);
    }
}
