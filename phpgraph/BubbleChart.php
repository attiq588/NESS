 
 <head><title>SVGGraph example</title></head>
	<body background="Pictures/b_g.jpg">
	 <h1><font color="white" style="position:absolute;top:10px;left:600px;width:550px;height:400px;z-index:999;position:fixed;">Bubble chart</font>  </h1>
	<div style="position:absolute;top:100px;left:400px;width:550px;height:400px;z-index:999;position:fixed;"><center>  

<?php

/**
 * @author lolkittens
 * @copyright 2014
 */

$fname='';
 if(isset($_GET['f']))
 {
    $f=$_GET['f'];
    $fname=$f . '.csv';
    
 }
 else
 {
    $fname='malaria.csv';
 }

$dt = csv_to_array($fname,',');

function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    
//    /* Custom code */
//
    require_once("Rectangular/Lib_Grid.php"); 
   	$g = new DocArea(400, 300); 
    
    
	$obj=new Grid();
    $obj->Grid();
//    
    $t=array();
    $t1=array();
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
                    $t[]=$row[0];
                    $t1[]=$row[1];
//                    echo('<ul>');
//                    echo('<li>');
//                    echo($row[0]);
//                    echo('   ');
//                    echo($row[1]);
//                    echo('</li>');
//                    echo('</ul>');
                }
            $x=join(',',$t);
            $x1=join(',',$t1);
        }
        fclose($handle);
    }
    echo($x);
   
    
    //$g->$t;
    //$g->$t1;
   	
    $g->SetValArray1($t1);
    
    $g->Text_H($t);
    $g->Text_V('10','20','30','40','50','60','70','80');
    echo $g->Fetch('BubbleChart');

 return $data;
}
    
?>