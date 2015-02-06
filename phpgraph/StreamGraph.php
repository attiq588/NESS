 
 <head><title>SVGGraph example</title></head>
	<body background="Pictures/b_g.jpg">
	 <h1><font color="white" style="position:absolute;top:10px;left:600px;width:550px;height:400px;z-index:999;position:fixed;">MultiBar Graph</font>  </h1>
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
    $fname='multivalue.csv';
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
   	$g = new DocArea(500, 400); 
    
    
	$obj=new Grid();
    $obj->Grid();
//    
    $label=array();
    $value1=array();
    $value2=array();
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
                    $value1[]=$row[1];
                   $value2[]=$row[2]; 
//                    echo('<ul>');
//                    echo('<li>');
//                    echo($row[0]);
//                    echo('   ');
//                    echo($row[1]);
                      echo('   '); 
                        echo($row[2]); 
//                    echo('</li>');
//                    echo('</ul>');
                }
            $x=join(',',$label);

            $x1=join(',',$value1);

             $x2=join(',',$value2);
        }
        fclose($handle);
    }
    echo($x);
   
    
    //$g->$label;
    //$g->$value1;
   //$g->$value2;
    $g->SetValArray1($value1);
    $g->SetValArray2($value2);
    $g->Text_H($label);
    $g->Text_V('10%','20%','30%','40%','50%','60%','70%','80%','90%','100%');
    echo $g->Fetch('StreamGraph');

 return $data;
}
    
