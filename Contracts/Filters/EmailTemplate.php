<?php
/**
 * Project: MCMIS
 *
 * Author: Farhan Wazir
 * Email: farhan.wazir@gmail.com, seejee1@gmail.com
 * Date: 3/25/2017
 * Time: 4:36 AM
 *
 *
 *
 * This project file is not redistributeable without permissions.
 * For more details about redistribution and reselling, contact to provided author details.
 */

namespace MCMIS\Contracts\Filters;


interface EmailTemplate
{
    public function template($type = 'new.user');

    public function raw();

    public function filter($models = []);
}