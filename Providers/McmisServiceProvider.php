<?php

namespace MCMIS\Providers;


class McmisServiceProvider extends ServiceProvider
{

    /**
     * Register service provider
     *
     * @return void
     */
    public function register(){
        foreach ($this->config['csys.dependencies'] as $name)
            $this->registerBootraper($this->registrar = $name);
    }

    public function registerBootraper($bootstraper){
        $this->bootstraper = $bootstraper;
    }

}