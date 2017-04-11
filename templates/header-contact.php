<?php use Roots\Sage\Titles; ?>
<header class="header header--shrink header--grow-md">
	<h1 class="header__title header__title--huge"><strong><?= Titles\title(); ?></strong></h1>
	<script type="text/javascript">
		var map_data = [[<?php echo get_field('map')['lat']; ?>, <?php echo get_field('map')['lng']; ?>]];
	</script>
</header>
<div class="map" ng-map map-id="map">
	<div id="map" class="map__container"></div>
	<nav class="map__nav">
		<span class="map__zoom map__zoom--in" ng-click="zoom(true)"></span>
		<span class="map__zoom map__zoom--out" ng-click="zoom(false)"></span>
	</nav>
</div>