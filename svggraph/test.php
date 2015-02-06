<?php

/**
 * @author lolkittens
 * @copyright 2014
 */

$settings['legend_entries'] = array(
  'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'
);
require_once 'SVGGraph.php';
$graph = new SVGGraph(500, 400,$settings);
$graph->Values(1, 4, 8, 9, 16, 25, 27);
$graph->Render('BarGraph');

?>