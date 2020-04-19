
<?php

$args = array(
    'category_name' => 'Nouvelle',
    'posts_per_page' => 3,
    'orderby' => 'date'
);

//Query des articles de la catégorie : Nouvelles
$queryNouvelles = new WP_Query( $args );

?>

<?php
get_header();
?>

<?php
echo '<div class="categorie-nouvelles">';
echo '<h1>Nos 3 dernières nouvelles</h1>';
echo '<div class="categorie-nouvelles-contenu">';

while ( $queryNouvelles->have_posts() ) {
    $queryNouvelles->the_post();
    echo '
    <article class="articles-nouvelles">
        <h3 class="title-article"><a href='.get_the_permalink().'>'.substr(get_the_title(),0,18).'</a></h3>';
        the_post_thumbnail('thumbnail');
        echo '
        <button id="ReadMoreBtn">En savoir plus</button>
        <div id="PostContainer"></div>
    </article>
    ';
}

wp_reset_postdata();

echo '</div>';
echo '</div>';
?>

<?php
get_footer();
?>