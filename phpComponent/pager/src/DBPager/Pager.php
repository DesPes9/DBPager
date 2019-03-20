<?php 
	namespace DBPager;
	abstract class Pager
	{
		protected $view;
		protected $parameters;
		protected $counter_param;
		protected $links_count;
		protected $items_per_page;

	public function __construct(
		View $view,//генерация внешнего вида страницы
		$items_per_page = 10,//количество жлементов на старнице
		$links_count=3,//количество страничек слева и справа от нынешней
		$get_params=NULL,//доп. GET параметры, которые будут передаваться с каждой ссылкой постраничной навигации(запоминание нынешней стр)
		$counter_param='page')//определяет название GET параметра
	{
		$this->view = $view;
		$this->parameters = $get_params;
		$this->links_count = $links_count;
		$this->items_per_page = $items_per_page;
		$this->counter_param = $counter_param;
	}

	abstract public function getItemsCount();
	abstract public function getItems();

	public function getVisibleLinkCount()//количество страничек слева и справа от нынешней
	{
		return $this->link_count;
	}
	public function getParameters()
	{
		return $this->parameters;
	}
	public function getCounterParam()
	{
		return $this->counter_param;
	}
	public function getItemsPerPage()//Возрвращает кол-во элементво на странице
	{
		return $this->items_per_page;
	}
	public function getCurrentPagePath()
	{
		return $_SERVER['PHP_SELF'];
	}
	public function getCurrentPage()//номер текущей страницы
	{
		if(isset($_GET[$this->getCounterParam()])){
			return intval($_GET[$this->getCounterParam()]);
		}
		else {
			return 1;
		}
	}

	public function getPagesCount()//общее количество страниц
	{
		$total = $this->getItemsCount();
		$result = (int)($total/$this->getItemsPerPage());
		if((float)($total/$this->getItemsPerPage())-$result!=0) $result++;

		return $result;
	}
	public function render()
	{
		return $this->view->render($this);
	}
	public function __toString()
	{
		return $this->render();
	}

	}
 ?>