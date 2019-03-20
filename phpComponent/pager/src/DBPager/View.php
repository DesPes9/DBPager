<?php 
	namespace DBPager;
	abstract class View
	{
		protected $pager;

		public function link($title, $current_page = 1)
		{
			return "<a style='text-decoration:none; color:black;' href='{$this->pager->getCurrentPagePath()}?"."{$this->pager->getCounterParam()}={$current_page}".
			"{$this->pager->getParameters()}'>{$title}</a>";
		}
		
		abstract public function render(Pager $pager);
	}
