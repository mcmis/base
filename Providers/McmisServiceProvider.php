<?php

namespace MCMIS\Providers;


class McmisServiceProvider extends ServiceProvider
{

    protected $bootstrapers = ['Support', 'Foundation', 'Workflow', 'Exporter', 'Jobs'];

    public function boot(){
        if(array_search('Support', $this->bootstrapers)){
            $this->loadViewsFrom(__DIR__.'../../support/src/Template/layouts', 'layout');
        }
    }

    /**
     * Register service provider
     *
     * @return void
     */
    public function register(){
        foreach (array_unique(array_merge($this->bootstrapers, (is_array($this->config['csys.dependencies'])?
            $this->config['csys.dependencies'] : []))) as $name)
            $this->bootstraper = $name;

        $this->models->load($this->config['models']);
    }

}