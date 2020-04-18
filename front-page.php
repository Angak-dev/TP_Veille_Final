<?php 

$args2 = array (
    'category_name' => 'evenement',
    'posts_per_page' => 3,
    'orderby' => 'date'
);

//Query des articles de la catégorie : evenements
$queryEvenement = new WP_Query( $args2 );


$args = array(
    'category_name' => 'Nouvelle',
    'posts_per_page' => 3,
    'orderby' => 'date'
);

//Query des articles de la catégorie : Nouvelles
$queryNouvelles = new WP_Query( $args );

//Appel du header
get_header();

?>
<!-- Figure qui controle la cadre de l'image de mise en avant -->

    <?php
        //Appel de la fonction qui affiche l'image de mise en avant
        the_post_thumbnail('full'); 
    ?>


<?php
// Appel du Query : Evenement
echo '
    <h1>Nos derniers évènements</h1>
    <div class="section_evenement">
    ';   

while ( $queryEvenement->have_posts() ) {
    $queryEvenement->the_post();
    echo '
    <article class="articles-evenements">
        <h3 class="title-article"><a href='.get_the_permalink().'>'.substr(get_the_title(),0,18).'</a></h3>';
        the_post_thumbnail('thumbnail');
        echo'
    </article>
    ';
}

wp_reset_postdata();

echo '</div>';
echo '</div>';
echo '</div>';
?>

<?php
// Appel du Query : Nouvelles
echo '<div class="categorie-nouvelles">';
echo '<h1>Nos dernières nouvelles</h1>';
echo '<div class="categorie-nouvelles-contenu">';

while ( $queryNouvelles->have_posts() ) {
    $queryNouvelles->the_post();
    echo '
    <article class="articles-nouvelles">
        <h3 class="title-article"><a href='.get_the_permalink().'>'.substr(get_the_title(),0,18).'</a></h3>';
        the_post_thumbnail('thumbnail');
        echo '
    </article>
    ';
}

wp_reset_postdata();

echo '</div>';
echo '</div>';
?>

<?php 
    echo '
        <section class="section_anim_box">
            <div class="box"></div>
        </section>
    ';
?>

<?php 
    echo '
        <section class="background_anim">
            
        </section>
    ';
?>

<?php 
//Appel du footer
get_footer();
?>