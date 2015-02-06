<!--
  <head><title>SVGGraph example</title></head>
  	<body background="Pictures/b_g.jpg">
  	 <h1><font color="white" style="position:absolute;top:10px;left:600px;width:550px;height:400px;z-index:999;position:fixed;">Bar Graph</font>  </h1>
  	<div style="position:absolute;top:100px;left:400px;width:550px;height:400px;z-index:999;position:fixed;"><center>  
 -->
<?php

/**
 * @author lolkittens
 * @copyright 2014
 */


$dt = csv_to_array('malaria.csv',',');

function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    
   
    $label=array();
    $value=array();
//    /*End Custom Code */
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        echo('This is List');
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
                if($row[0]=='City')
                    {
                        
                    }
                else
                {
                    $label[]=$row[0];
                    $value[]=$row[1];
                    echo('<ul>');
                    echo('<li>');
                    echo($row[0]);
                    echo(' ,  ');
                    echo($row[1]);
                    echo('</li>');
                    echo('</ul>');
                }
            $x=join(',',$label);
            $x1=join(',',$value);
        }
        fclose($handle);
    }
    echo($x1);
   
 

 return $data;
}
   
 
?>