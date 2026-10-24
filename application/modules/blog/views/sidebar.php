<div class="widget-items mb-40">
	<?php
	$city = "Bagdogra, Siliguri";
	$keyw = array(
		"Plots for sale in $city", "Luxury bungalows for sale in $city", "Residential plots in $city", 
		"Buy plot in Bagdogra", "Bungalows for sale in Siliguri", "Gated community plots $city", 
		"Villa plots for sale $city", "Plots near Bagdogra Airport", "The Gardenia Estate plots", 
		"Commercial plots for sale in $city", "Independent bungalows $city", "RERA approved plots $city", 
		"Ready to construct plots in $city", "Best plots for sale Siliguri", "Luxury villas and bungalows $city"
	);
	?>
	<h6 class="fw-bold text-success mb-3">Popular Searches in <?= $city ?></h6>
	<ul class="inline list-unstyled d-flex flex-wrap gap-2">
		<?php
		shuffle($keyw);
		foreach ($keyw as $k) { ?>
			<li class="badge bg-light text-dark border p-2"><?= $k ?></li>
		<?php } ?>
	</ul>
</div>