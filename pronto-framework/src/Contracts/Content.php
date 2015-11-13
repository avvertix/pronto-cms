<?php

namespace Pronto\Contracts;

interface Content
{
	function menu();
	
	function pages();
	
	function sections();
	
	function section_menu($section);
	
	function is_section($path);
	
	

}