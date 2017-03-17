<?php

namespace MCMIS\Contracts\Report;


interface ModelFiltration
{

    public function create($statuses, $categories);

    public function roleSpecified();

    public function get();

}