<?php

namespace MCMIS\Contracts;


interface Exporter
{

    public function create($name, $extension, $title, $sheets = [], $response = 'download');

    public function getColumnsIndexing();

    public function extendSheetAsBig();

    public function getSheetHiddenState();

    public function set($extender);

}