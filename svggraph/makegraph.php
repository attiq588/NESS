<?php
$dataset=$_POST["dataset"]; 
$filename=$dataset . '.csv';
$graphtype=$_POST["charttype"];
$delimiter=',';
//$dt = csv_to_array($filename,',');

  if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    
    $titles=array();
    $values=array();


  if (($handle = fopen($filename, 'r')) !== FALSE)
    {
       
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
                if($row[0]=='Fruits'||$row[0]=='City'||$row[0]=='Month'||$row[0]=='Popultion')
                    {
                        
                    }
                else
                {
                    $titles[]=$row[0];
                    $values[]=$row[1];
                    
            $x=join(',',$titles);
            $x1=join(',',$values);
             
            }
        }
        fclose($handle);
    }



$settings['legend_entries'] = $titles;
$settings['legend_position'] ="bottom center";

require_once 'SVGGraph.php';
$graph = new SVGGraph(1300, 500,$settings);
$graph->Values($values);
$graph->Render($graphtype);


?>