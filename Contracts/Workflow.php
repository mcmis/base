<?php

namespace MCMIS\Contracts;


interface Workflow
{

    public function get($status);

    public function hasFlow($role, $status);

    public function allowedFlow($role);

    public function canView($role);

}