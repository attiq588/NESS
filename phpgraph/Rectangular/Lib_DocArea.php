<?php
//DocArea.php -> SCGGraph.php
 
class DocArea {
	var $colours = NULL;
	var $width = 400;
	var $height = 400;
	var $settings = array();
	var $SetValArray1 = array();
	var $SetValArray2 = array(); 
	var $text_h = array(); 
	var $text_v = array();

	function DocArea($w, $h, $settings = NULL) //constructor
	{
		$this->width = $w;
		$this->height = $h;
		if(is_array($settings))
			$this->settings = $settings;
		//$this->colours = array('#11c','#c11','#cc1','#1c1','#c81',
		//							'#116','#611','#661','#161','#631');
	
	}
	
	function Colours()
	{
		$this->colours = func_get_args();
	}
	function SetValArray1()
	{
		$this->SetValArray1 = func_get_args();
	}
	 
	function SetValArray2()
	{
		$this->SetValArray2 = func_get_args();
	}
	function Text_H()
	{
		$this->text_h = func_get_args();
	}
	function Text_V()
	{
		$this->text_v = func_get_args();
	}
	function Setup($class)
	{
		// load the relevant class file
		require_once('Lib_' . $class . '.php');

		$g = new $class($this->width, $this->height, $this->settings);
		$g->SetValArray1($this->SetValArray1); 
		$g->Text_H($this->text_h); 
		$g->Text_V($this->text_v); 
		$g->SetValArray2($this->SetValArray2); 
       if(!is_null($this->colours))
      $g->colours = $this->colours;		
		return $g;
	}
	 

	function Fetch($class, $header = TRUE)
	{
		$g = $this->Setup($class);
		return $g->Fetch($header);
	}
}
class Graph {
	var $back_colour = 'rgb(240,240,240)';
	var $stroke_colour = 'rgb(0,0,0)';
	var $colour=null;

	function Graph($w, $h, $settings = NULL)
	{
		$this->width = $w;
		$this->height = $h; 
		$this->colours = explode(' ', $this->svg_colours);
		shuffle($this->colours);
	}

	function SetValArray1()
	{
		$args = func_get_args();
		if(is_array($args[0]))
			$this->SetValArray1 = $args[0];
		else
			$this->SetValArray1 = $args;
	}

	function GetValues($row = 0)
	{
		if(is_array($this->SetValArray1[$row]))
			return $this->SetValArray1[$row];
		
		return $this->SetValArray1;
	}
	function SetValArray2()
	{
		$args = func_get_args();
		if(is_array($args[0]))
			$this->SetValArray2 = $args[0];
		else
			$this->SetValArray2 = $args;
	}

	function GetValues1($row1 = 0)
	{
		if(is_array($this->SetValArray2[$row1]))
			return $this->SetValArray2[$row1];
		
		return $this->SetValArray2;
	}
	function Text_H()
	{
		$args = func_get_args();
		if(is_array($args[0]))
			$this->text_h = $args[0];
		else
			$this->text_h = $args;
	}
	function Text_V()
	{
		$args = func_get_args();
		if(is_array($args[0]))
			$this->text_v = $args[0];
		else
			$this->text_v = $args;
	}

	function GetText_H($row = 0)
	{
		if(is_array($this->text_h[$row]))
			return $this->text_h[$row];
		
		return $this->text_h;
	}
	function GetText_V($row = 0)
	{
		if(is_array($this->text_v[$row]))
			return $this->text_v[$row];
		
		return $this->text_v;
	}
	function GetKey($index, $row = 0)
	{
		$vals = (is_array($this->SetValArray1[$row]) ? $this->SetValArray1[$row] : $this->SetValArray1);
		$k = array_keys($vals);
 
		if(is_int($k[0]) && $k[0] == 0)
			return $index;
		if(isset($k[$index]))
			return $k[$index];
		return NULL;
	}
	function GetKey1($index, $row1 = 0)
	{
		$vals1 = (is_array($this->SetValArray2[$row1]) ? $this->SetValArray2[$row1] : $this->SetValArray2);
		$k = array_keys($vals1);
 
		if(is_int($k[0]) && $k[0] == 0)
			return $index;
		if(isset($k[$index]))
			return $k[$index];
		return NULL;
	} //////////////////////////////////////------------------------------
	function GetKeyText_H($index, $row = 0)
	{
		$txt = (is_array($this->text_h[$row]) ? $this->text_h[$row] : $this->text_h);
		$k = array_keys($txt);
 
		if(is_string ($t[0]) && $t[0] == 0)
			return $index;
		if(isset($t[$index]))
			return $t[$index];
		return NULL;
	}
	function GetKeyText_V($index, $row = 0)
	{
		$txt = (is_array($this->text_v[$row]) ? $this->text_v[$row] : $this->text_v);
		$k = array_keys($txt);
 
		if(is_string ($t[0]) && $t[0] == 0)
			return $index;
		if(isset($t[$index]))
			return $t[$index];
		return NULL;
	}
	function Colours()
	{
		$this->colours = func_get_args();
	}
 
	/**
	 * Returns the maximum value
	 */
	function GetMaxValue()
	{
		if(is_array($this->SetValArray1[0]))
			return max($this->SetValArray1[0]);
		return max($this->SetValArray1);
	}
	function GetMaxValue1()
	{
		if(is_array($this->SetValArray2[0]))
			return max($this->SetValArray2[0]);
		return max($this->SetValArray2);
	}
	function GetMaxText_H()
	{
		if(is_array($this->text_h[0]))
			return max($this->text_h[0]);
		return max($this->text_h);
	}

	function GetMaxText_V()
	{
		if(is_array($this->text_v[0]))
			return max($this->text_v[0]);
		return max($this->text_v);
	}	
	/**
	 * Draws the selected graph
	 */
	 
	 
	 
	 function Draw()
	{
		return $this->Element('text', array('stroke' => $this->stroke_colour,'fill'=>"#FFFFFF"), NULL,
			'Draw() must be overridden by class');
	}

	function DrawGraph()
	{
		$docText_H = $this->DocText_H();
		$body = $this->Element('g', array('clip-path' => "url(#canvas)"), NULL, $this->Draw());
		return $docText_H . $body;
	} 

	/**
	 * Displays the background
	 */
	function DocText_H()
	{
		$docText_H = array(
			'width' => '100%', 'height' => '100%',	'fill' => $this->back_colour ); 
	} 
	function Element($name, $attribs = NULL, $styles = NULL, $content = NULL)
	{
		// these properties require units to work well
		$require_units = array('stroke-width' );
 
		$element = '<' . $name;
		if(is_array($attribs))
			foreach($attribs as $attr => $val) {

				// if units required, add px
				if(array_search($attr, $require_units) !== FALSE)
				
					$val .= 'px'; 
				$element .= ' ' . $attr . '="' . htmlspecialchars($val) . '"';
			}
		 
		if(is_null($content))
			$element .= "/>\n";
		else
			$element .= ">" . $content . "</" . $name . ">\n";

		return $element;
	}
	var $svg_colours = " black blue blueviolet brown burlywood cadetblue chartreuse chocolate coral crimson cyan darkblue darkcyan darkgoldenrod darkgray darkgreen darkgrey darkkhaki darkmagenta darkolivegreen darkorange darkorchid darkred darksalmon darkseagreen darkslateblue darkslategray darkslategrey darkturquoise darkviolet deeppink deepskyblue  dimgrey dodgerblue firebrick  forestgreen fuchsia gold goldenrod green greenyellow  hotpink indianred indigo lawngreen magenta maroon  midnightblue navy olive olivedrab orange orangered orchid palegoldenrod palegreen paleturquoise peru plum purple red rosybrown royalblue saddlebrown salmon sandybrown seagreen sienna silver tan teal thistle tomato violet yellow yellowgreen";
	
	
	function GetColour($key)
	{
		if(!isset($this->colours[$key]))
			return 'none';
		if(is_array($this->colours[$key]))
			
				return $this->colours[$key][0];
			
				
		return $this->colours[$key];
	}
	function Fetch()
	{
		$content = '';
			$body = $this->DrawGraph(); 
		$svg = array('width' => 1200, 
		'height' =>800,
		'version' => '1.1',); 
		$content .= $this->Element('svg', $svg, NULL, $body);

		
		return $content;
	}
}

class Axis {

	function Axis($width, $max_val)
	{
		$this->full_width = $width;
		$this->max_value = $max_val;
	}
	 function Grid($min)
	{
		$g = $this->full_width / $this->max_value;
		$this->unit_size =  $g;
		while($g < $min)
			$g *= 30; //execution time
		return $g;
	} 

	function Unit()
	{
		if(!isset($this->unit_size))
			$this->Grid(1);

		return $this->unit_size;
	}
}
?>
