<?php 
	class PowerRequirements {
	   const MAX_HULL_SPEED = 30;
	   const HULL_SPEED_STEP = 5;
		
	   var $hull_length;
	   var $buttock_angle;
	   var $displacement;
	  
	   function PowerRequirements($hull_length, $buttock_angle, $displacement) 
	   {
		   $this->hull_length = $hull_length;
		   $this->buttock_angle = $buttock_angle;
		   $this->displacement = $displacement;
	   }
		
		function getSLRatio(){
			return ($this->buttock_angle * -0.2) + 2.9;
		}
		
		function getCw(){
			return 0.8 + (0.17 * $this->getSLRatio());
		}
		
		function getHullSpeed(){
			return round(pow($this->hull_length, 0.5) * $this->getSLRatio(), 2);
		}
		
	    function getHP($hull_speed) 
	    {
		   return number_format(($this->displacement/1000) * pow($hull_speed / ($this->getCw() * pow($this->hull_length, 0.5)),3), 2);
	    }

		function getStats(){
			$response = array();
			$i = $this->getHullSpeed();
			while($i < self::MAX_HULL_SPEED){
				$response[(string)$i] = $this->getHP($i);
				$i += self::HULL_SPEED_STEP;
				
				if ($i >= self::MAX_HULL_SPEED){
					$response[(string)self::MAX_HULL_SPEED] = $this->getHP(self::MAX_HULL_SPEED);
				}
			}
			
			return $response;
		}
	}