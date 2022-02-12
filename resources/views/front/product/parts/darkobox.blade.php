<?php

// TODO

/*
<!-- List of Darkobox products -->

<?php
$products_list = get_field('products_list');
$product_type = get_field('product_type');
if ($product_type == 'darkobox') :
    if ($products_list) : ?>

<h2>Darkobox obsahuje zážitky</h2>
<div class="col-md-12">
<div class="stips-darkobox-tamplate-products">
<?php foreach ($products_list as $product_list) : ?>
<div class="darkobox-product">
<?php
$rel_product_id = $product_list->ID;
$rel_product = wc_get_product($product_list->ID);
$units_sold_darko = get_post_meta($rel_product_id, 'total_sales', true);
$units_sold_darko = is_numeric($units_sold_darko) ? $units_sold_darko : 0;
$sales_darko = get_post_meta($rel_product_id, 'eg-customproductsales', true);
$customsalesno = is_numeric($sales_darko) ? $sales_darko : 0;
$totalsales_darko = $customsalesno + $units_sold_darko;
$rating  = $rel_product->get_average_rating();

$regions = wp_get_post_terms( $rel_product_id, 'pa_region' );
$region_names = [];

foreach ($regions as $region) {
$region_names[] = $region->name;
}
if (count ($region_names) <= 2) {
$region_str = implode(",", $region_names);
} else {
$region_str = 'Vícero míst';
}
?>


<div class="darkobox-product-wrapper" style="background-image: url(<?php echo wp_get_attachment_url($rel_product->get_image_id()); ?>);">
<div class="darkobox-product-overlay"></div>
<div class="info-marks">
<div class="pocet">
<i class="fa fa-user" aria-hidden="true"></i> <?php echo get_field('eg-pocetosob', $rel_product_id) ?>
</div>
<div class="hodiny">
<i class="far fa-clock" aria-hidden="true"></i> <?php echo get_field('eg-hodiny', $rel_product_id) ?>
</div>

<div class="hodnoceni">
<i class="fas fa-angle-double-up"></i> Využito: <?php echo $totalsales_darko; ?>
</div>

<div class="region">
<i class="fas fa-map-signs"></i> Region: <?php echo $region_str; ?>
</div>

</div>

<div class="darkobox-product-content">
<a class="darkobox-product-title" target="_blank" href="<?php the_permalink($product_list->ID); ?>"> <?php echo $rel_product->get_title(); ?> </a>

<div class="darkobox-rating hodnoceni" title="Hodnocen <?php echo $rating; ?> z 5">
                                    <span style="width:<?php echo $rating * 20; ?>%">
                                        <strong itemprop="ratingValue"><?php echo $rating; ?></strong>
                                        <span itemprop="bestRating">5</span>
                                        <span itemprop="worstRating">1</span>
                                    </span>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
<div class="clear"></div>
<?php wp_reset_postdata(); ?>
<?php endif;
endif; ?>
*/

?>
