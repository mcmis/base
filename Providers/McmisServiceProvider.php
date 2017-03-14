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
            $this->bootstraper = $this->registrar = $name;
    }

}