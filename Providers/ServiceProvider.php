<?php

namespace MCMIS\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

abstract class ServiceProvider extends BaseServiceProvider
{

    protected $psr = 'MCMIS';

    /**
     * Dependency bootstraper
     *
     * @param $straper
     */
    protected function bootstraper($straper){
        $straper = $this->getRegistrar($straper);
        (new $straper)->bootstrap($this->app);
    }

    /**
     * Get Registrar
     *
     * @param $straper
     * @return string
     */
    protected function getRegistrar($straper){
        return $this->psr .'\\'. $straper .'\Register';
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
    public function __set($setter, $value){
        return call_user_func([$this, $setter], $value);
    }

}
