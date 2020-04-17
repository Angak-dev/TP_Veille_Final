<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
     
        <?php
        echo '<h2>' . category_description(get_category_by_slug('atelier')) . '</h2>';
        ?>

        <section class='grille-atelier'>   
		<?php
		$tabAuteur = [];
		$colonne = 0;
		while ( have_posts() ) :
			the_post();
			$auteur =  get_the_author_meta( 'display_name', $post->post_author );
			if (! array_key_exists($auteur,$tabAuteur))
			{
				$colonne++;
				$tabAuteur += [$auteur => $colonne];
			}
			$colonne = $tabAuteur[$auteur];
			$tabPostName = explode('-',get_post_field('post_name'));
			$rangee = $tabPostName[1]-6;
			//print_r ($rangee); 
			$gridArea = 'grid-area: ' . $rangee . '/' . $colonne . '/' . ($rangee+2) . '/' . ($colonne+1);
			echo '<div style="'. $gridArea . '">';
			echo  '<h2>' . get_the_title() . '</h2>';
			echo  '<p>' . get_post_field('post_name') . '</p>';
			echo  '<p>' . get_the_author_meta( 'display_name', $post->post_author ) . '</p>';
			echo '</div>';
		endwhile; // Fin de la boucle.
		// print_r($tabAuteur);
	
		foreach ($tabAuteur as $auteur => $colonne)
		{
			$gridArea_entete = 'grid-area: ' . 1 . '/' . $colonne ;
			echo '<div style="'. $gridArea_entete . '" class="couleur_'.$colonne.'">';
			echo '<h2>' . $auteur . '</h2>';
			echo '</div>';

			$gridArea_lunch = 'grid-area: ' . 6 . '/' . $colonne ;
			echo '<div style="'. $gridArea_lunch . '" class="couleur_'.$colonne.'">';
			echo '<h2>LUNCH</h2>';
			echo '</div>';
		} // fin du foreach
		
        ?>
        </section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();