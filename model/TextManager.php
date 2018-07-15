<?php
class textManager
{
		public $_stringLenght = 40;										
		
		public function initSummary($datas)
		{
			$newDatas = html_entity_decode($datas);				
			/*	
			$stringDelete= array(' ', "\t",'0','1','2','3','4','5','6','7','8','9', '=', '+', '-', '*', '/', '\\', ',', '.', ';', ':', '[', ']', '{', '}', '(', ')', '<', '>', '&', '%', '$', '@', '#', '^', '!', '?', '~', '|');
			$newDatas2= str_replace($stringDelete, " ", $newDatas);				
			*/
			if (str_word_count($newDatas) <= $this->_stringLenght)
			{
				$this->_stringLenght = str_word_count($newDatas)-2 ;
				$this->summary($newDatas);
			}
			else
			{
				$this->summary($newDatas);
			}			
		}
		public function summary($newDatas)
		{
			$summary = explode(" ",$newDatas); 						
			
			for ($i=0; $i<$this->_stringLenght; $i++)
			{
				echo $summary[$i]." ";
			}
			echo "...";
		}
}