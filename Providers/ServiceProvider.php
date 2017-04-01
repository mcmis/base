<?php

namespace MCMIS\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

abstract class ServiceProvider extends BaseServiceProvider
{

    protected $psr = 'MCMIS';

    protected $events = [];

    /**
     * Dependency bootstraper
     *
     * @param $straper
     */
    protected function bootstraper($straper)
    {
        $straper = $this->getRegistrar($straper);

        $instance = $this->resolve($straper);

        if (method_exists($instance, 'onExecute')) {
            $this->events[$straper] = [$instance, 'onExecute'];
        }

        $this->fireOnRegister($instance);

        $instance->bootstrap($this->app);

        $this->fireOnRegistered($instance);
    }

    /**
     * Get Registrar
     *
     * @param $straper
     * @return string
     */
    protected function getRegistrar($straper)
    {
        return $this->psr . '\\' . $straper . '\Register';
    }

    /**
     * Fire before register bootstrap
     *
     * @param $object
     */
    protected function fireOnRegister($object)
    {
        if (method_exists($object, 'onRegister')) {
            $instance = static::class;

            $object->onRegister($instance);
        }
    }

    /**
     * Fire after registered bootstrap
     *
     * @param $object
     */
    protected function fireOnRegistered($object)
    {
        if (method_exists($object, 'onRegistered')) {
            $instance = static::class;

            $object->onRegistered($instance);
        }
    }

    /**
     * Resolve abstract
     *
     * @param $abstract
     * @return mixed
     */
    protected function resolve($abstract)
    {
        return new $abstract;
    }

    /**
     * Provider boot method
     *
     * @return void
     */
    public function boot()
    {
        $instance = static::class;

        foreach ($this->events as $event) {
            call_user_func($event, [$instance]);
        }

        unset($this->events);
    }

    /**
     * container services.
     *
     * @param $prop
     * @return mixed
     */
    public function __get($prop)
    {
        return $this->app[$prop];
    }

    /**
     * Set for dynamic request
     *
     * @param $target
     * @param $value
     * @return mixed
     */
    public function __set($setter, $value)
    {
        return call_user_func([$this, $setter], $value);
    }

}
