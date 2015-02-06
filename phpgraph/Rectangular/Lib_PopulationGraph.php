<?php

require_once('Lib_DocArea.php');
require_once('Lib_Grid.php');

	class PopulationGraph extends Graph {
		var $bar_space = 0; 
		var $g_height=1200;
		var $g_width=800;
		function Draw()
			{
				$values1=$this->GetValues1();
				$values=$this->GetValues();
				$min=min($values);
				$min1=min($values1);
				$a=count($values1);
				$n = count($values);
				$Text_x = $this->GetText_H();
				$labels_x = count($Text_x); 
				$Text_y= $this->GetText_H();
				$labels_y = count($Text_y);
				/* if($n!=$a ||$labels_y!=$n ||$labels_y!=$a )
				{
					$var_4="<svg>";
					$var_4.="\n <text x=\"80 \" y=\"70\" font-family=\"Verdana\" font-size=\"30\">"."error in values" ;
					$var_4.= "\n</text>"; 
					echo $var_4;
				}
				else
				{ */
					$v_max = $this->GetMaxValue();
					$this->g_height = $this->height - 20;
					$this->g_width = $this->width - 20;
					$values = $this->GetValues();
					$v_count = count($values);
					$MaxKey = $v_count+1;
					$x_axis = new Axis($this->g_width, $MaxKey);
					$y_axis = new Axis($this->g_height, $v_max);

					$this->bar_unit_width = $x_axis->Unit();
					$this->bar_unit_height = $y_axis->Unit(); 
					$this->axes_calc_done = true;
					$body="";
					$bnum = 0;
					$b_start = 60 + ($this->bar_space / 2); 
					$values = $this->GetValues();
					$width = $this->bar_unit_width / 2;
					$wd = $this->bar_unit_width / 1.5;
					$sLine=$min-$v_max;
					foreach($values as $key => $value) 
					{

						if($sLine<=20)
						{
							$Sum=$min+$v_max;
							$Sum=$Sum/2; 
							$value=$value+$Sum;
							$value=$value/2; 
							$x = $b_start + ($this->bar_unit_width * $bnum) +33;
							$height = $value * $this->bar_unit_height- 100;
							$y = 70 + $this->g_height - $height; 
							$var_1 = " <g transform=\"rotate(-90 179.00000000000009,279.00000000000006)\">";
							$var_1 .= " <rect x=\"$x\" y=\"$y\" width=\"$wd\" height=\"$height\" fill=\"red\" stroke=\"none\" stroke-width=\"2\" id=\"svg_3\"/>";
							$var_1 .= " </g >";
							$body .= $var_1;
							++$bnum; 
						} 
						else
						{
							$x = $b_start + ($this->bar_unit_width * $bnum) +33;
							$height = $value * $this->bar_unit_height- 100;
							$y = 70 + $this->g_height - $height; 
							$var_1 = " <g transform=\"rotate(-90 179.00000000000009,279.00000000000006)\">";
							$var_1 .= " <rect x=\"$x\" y=\"$y\" width=\"$wd\" height=\"$height\" fill=\"red\" stroke=\"none\" stroke-width=\"2\" id=\"svg_3\"/>";
							$var_1 .= " </g >";
							$body .= $var_1;
							++$bnum; 
						}
					}
	///////////////////////////////////////////////////////RIGHT BARS /////////////////////////////////////////////////////////////////////
					$b_start1 = 60 + ($this->bar_space / 2); 
					$values1 = $this->GetValues();
					$bnum1 = 0;
					$v_max1 = $this->GetMaxValue1();
					$this->g_height = $this->height - 20;
					$this->g_width = $this->width - 20;
					$values1 = $this->GetValues1();
					$v_count1 = count($values1);
					$MaxKey1 = $v_count1+1;
					$x_axis1 = new Axis($this->g_width, $MaxKey1);
					$y_axis1 = new Axis($this->g_height, $v_max1);

					$this->bar_unit_width = $x_axis1->Unit();
					$this->bar_unit_height = $y_axis1->Unit(); 
					$this->axes_calc_done = true;
					$sLine1=$min1-$v_max1;
					$sLine=$min-$v_max;
					foreach($values1 as $key => $value1) 
					{
						if($sLine1<=20)
						{
							$Sum=$min1+$v_max1;
							$Sum=$Sum/2; 
							$value1=$value1+$Sum;
							$value1=$value1/2; 
							$x1 = $b_start1 + ($this->bar_unit_width * $bnum1) +99;
							$height1 = $value1 * $this->bar_unit_height - 100;
							$y1 = 118 + $this->g_height ; 
							$var_1 = "\n <g transform=\"rotate(-90 189.00000000000003,335) \">"; 
							$var_1 .= "\n";
							$var_1 .= " <rect x=\"$x1\" y=\"$y1\" width=\"$wd\" height=\"$height1\" fill=\"blue\" stroke=\"none\" stroke-width=\"2\" id=\"svg_3\"/>";
							$var_1 .= "\n"; 
							$var_1 .= "</g>" ; 
							$body .= $var_1; 
							++$bnum1; 
						}
						else 
						{ 
							$x1 = $b_start1 + ($this->bar_unit_width * $bnum1) +99;
							$height1 = $value1 * $this->bar_unit_height - 100;
							$y1 = 118 + $this->g_height ; 
							$var_1 = "\n <g transform=\"rotate(-90 189.00000000000003,335) \">"; 
							$var_1 .= "\n";
							$var_1 .= " <rect x=\"$x1\" y=\"$y1\" width=\"$wd\" height=\"$height1\" fill=\"blue\" stroke=\"none\" stroke-width=\"2\" id=\"svg_3\"/>";
							$var_1 .= "\n"; 
							$var_1 .= "</g>" ; 
							$body .= $var_1; 
							++$bnum1; 
						}

					}
					//_________________________RIGHT T E X T________________________
					$h = 0;
					$txt_h = $this->GetMaxText_H();
					$Text_h = $this->GetText_H();
					$t_h = count($Text_h);
					$j=348; 
					foreach($Text_h as $key2 => $text_h)
					{

						$key2=$key2+5;
						$var_1.="\n <text x=\"$j\" y=\"380\" font-family=\"Verdana\" fill=\"blue\" font-size=\"8\">" .$text_h;
						$var_1.= "\n</text>";
						++$h;
						$j=$j-50;
					//$y=$y-2;
					}
					//_________________________LEFT T E X T________________________
					$v=0;
					$txt_v = $this->GetMaxText_V();
					$Text_v = $this->GetText_V();
					$t_v = count($Text_v);

					$y=361;
					$x=380;
					//$values=array_reverse($Text_v);

					foreach($Text_v as $key1 => $text_v)
					{
					 
						$key1=$key1+5;
						$var_1.="\n <text x=\"$x\" y=\"380\" font-family=\"Verdana\" fill=\"blue\" font-size=\"8\">" .$text_v;
						$var_1.= "\n</text>";
						++$v;
						$x=$x+50;
					}

					//_________________________X-Y lines________________________
					$var_1 .= "";
					$var_1 .= "\n<g transform=\"translate(10,370) scale(1,-1)\" >"; 
					$var_1 .= "<line x1=\"341\" y1=\50\" x2=\"341\" y2=\"390\" style=\"stroke: black; stroke-width:2;\"/>";
					$var_1 .= "\n" ;
					$var_1 .= "<line x1=\"41\" y1=\50\" x2=\"41\" y2=\"370\" style=\"stroke: rgb(220,220,220); stroke-width:2;\"/>";
					$var_1 .= "</g>" ;
					return $body.$var_1;

				//}
					
			}
	}
?>