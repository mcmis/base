<?php

namespace MCMIS\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    protected $psr = 'MCMIS';

    /**
     * Dependency bootstraper
     *
     * @param $straper
     */
    protected function bootstraper($straper){
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
     * @param  string $key
     * @return mixed
     */
    public function __get($prop)
    {
        return $this->app[$prop];
    }

    /**
     * Set for dynamic getter
     *
     * @param $target
     * @param $value
     * @return mixed
     */
    public function __set($setter, $value){
        if($setter == 'registrar'){
            return call_user_func([$this, 'get'.ucfirst($setter)], $value);
        }

        return call_user_func([$this, $setter], $value);
    }

}
