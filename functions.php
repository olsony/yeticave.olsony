<?php

    /**
     * Подключает шаблоны
     * @param string $path Путь к файлу шаблона
     * @param array $array Массив с данными для этого шаблона
     *
     * @return string Итоговый HTML-код с подставленными данными
     */
	 
	function render_template($path, $array) 
	{
		if (!file_exists($path)) 
		{
			return '';    
		};
	
		ob_start("ob_gzhandler");
        extract($array, EXTR_SKIP);
        require $path;

        return ob_get_clean();					
	}
	
	function price_rub($price) 
	{
		$num = ceil($price);
		if ($num > '1000') 
		{
			//$num = number_format($num);
			$num1 = substr($num, -3);
			$num2 = substr($num, 0, -3);
			$price = $num2 . " " . $num1 . '<b class="rub">р</b>';
		}
		return $price;
	}

	