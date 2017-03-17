<?php
namespace MCMIS\Contracts;


interface ExporterExtender
{

    public function export($data);

    public function enableChart();

    public function disableChart();

    public function isChartEnabled();

}