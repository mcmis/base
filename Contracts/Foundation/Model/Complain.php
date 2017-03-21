<?php

namespace MCMIS\Contracts\Foundation\Model;


interface Complain
{

    public function user();

    public function creator();

    public function category();

    public function childCategory();

    public function sources();

    public function comments();

    public function photos();

    public function documents();

    public function state();

    public function location();

    public function assignments();

    public function unassigned();

    public function options();

    public function request();

    public function children();

    public function parent();

}