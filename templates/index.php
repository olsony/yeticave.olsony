  <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
		<ul class="promo__list">
		<?php 
		
	$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
		
		$index = 0;
		$num = count($categories);
		while ($index < $num) {
		$lots_ci = $categories[$index];
		print ('<li class="promo__item promo__item--boards"><a class="promo__link" href="all-lots.html">' . 
		$lots_ci . '</a></li>');
		$index++;} 
		?> 
		</ul>
    </section>
   <section class="lots">
	    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">  
	<?php

  			foreach ($lots as $key => $item): ?>
				<li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$item['urlimage']; ?>" width="350" height="260" alt="<?=$item['category']; ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$item['category']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?=$key; ?>"><?=$item['title']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=price_rub($item['price']); ?></span>
                        </div>
                        <div class="lot__timer timer">
							<?php
							date_default_timezone_set("Europe/Kiev");
							
							$time_tomorrow = strtotime('tomorrow');
							$ts = time();
							$secs_to_midnight = $time_tomorrow - $ts;
							$hours = floor($secs_to_midnight / 3600);
							$minuts = floor(($secs_to_midnight % 3600) / 60);
							if ($minuts < 9) 
							{ print(" $hours:0$minuts часов"); }
								else
									{ print(" $hours:$minuts часов");}
							?>
							
                        </div>
                    </div>
                </div>
            </li>
			<?php endforeach; ?>
		</ul>
    </section>