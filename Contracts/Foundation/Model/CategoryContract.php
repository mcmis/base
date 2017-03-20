<?php

namespace MCMIS\Contracts\Foundation\Model;


interface CategoryContract
{

    public function complaints();

    public function childComplaints();

    public function children();

    public function department();

    public function options();

}