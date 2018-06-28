<?php

/*
Template Name: Template Filter
*/

/** get header */

get_header();


$url_page = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


$tiendo = get_terms( 'tien-do', array(
    'orderby'    => 'date',
    'hide_empty' => 0
) );


$sanpham = get_terms( 'san-pham', array(
    'orderby'    => 'date',
    'hide_empty' => 0
) );


$get_tiendo = $_GET['tien-do'];

$get_sanpham = $_GET['san-pham'];
?>
<div class="container">
<form action="<?php echo $url_page?>" method="get">
        <select name="tien-do" id="tien-do">
            <option value=""><?php echo __('Theo tiến độ','thuythu')?></option>
            <?php 
                foreach ($tiendo as $key => $value) {
                    if( $value->slug == $get_tiendo ){
                        echo '<option value="'.$value->slug.'" selected="selected">'.$value->name.'</option>';
                    }else{
                        echo '<option value="'.$value->slug.'">'.$value->name.'</option>';
                    }
                }
            ?>
        </select>
        <select name="san-pham" id="san-pham">
            <option value=""><?php echo __('Theo sản phẩm','thuythu')?></option>
            <?php 
                foreach ($sanpham as $key => $value) {
                    if( $value->slug == $get_sanpham ){
                        echo '<option value="'.$value->slug.'" selected="selected">'.$value->name.'</option>';
                    }else{
                        echo '<option value="'.$value->slug.'">'.$value->name.'</option>';
                    }
                }
            ?>
        </select>
        <input type="submit" value="Lọc" name="loc">
        <input type="submit" value="Tất cả" name="all">
</form>
</div>


<?php


/****
 * 
 * 
 * get all post or portfolio
 * 
 * 
 * 
 */

 $tax_query = array();
 $args = array(

    'post_type'         => 'post',
    'posts_per_page'    => -1,

 );

 /**** nếu lọc */
if( isset($_GET['loc']) ) {
    if( isset($_GET['tien-do']) && !empty($_GET['tien-do'])  ){
        $tax_query[] = array(
            'taxonomy'    => 'tien-do',
            'field'       => 'slug',
            'terms'       => $_GET['tien-do'],
        );
    }
    
    if( isset($_GET['san-pham']) && !empty($_GET['san-pham']) ){
        $tax_query[] = array(
            'taxonomy'    => 'san-pham',
            'field'       => 'slug',
            'terms'       => $_GET['san-pham'],
        );
    }
}else{

}

/***
 * 
 *  ngược lại lấy tất cả
 * 
 */

 /**** nếu lọc */
$tax_count = count( $tax_query );

if( $tax_count > 1 ) {
    $tax_query['relation'] = 'AND';
}
if( $tax_count > 0 ) {
    $args['tax_query']  = $tax_query;
}

$query = new WP_QUERY( $args ); 
    

?>


<!-- show content        -->

<div class="container">
<?php
if ( $query->have_posts() ) : ?>
<?php while ( $query->have_posts() ) : $query->the_post(); 

    get_template_part( 'content', get_post_format() );

    endwhile; 
wp_reset_query();
endif;

?>
</div>
 <?php



/** get footer */
get_footer();
