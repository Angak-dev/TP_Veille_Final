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
//////////////////////////////////////////////////// category-cours //////

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
     
        <?php
        echo '<h2>' . category_description(get_category_by_slug('cours')) . '</h2>';
        ?>
    
        <section class='grille-cours'> 
	
        <?php
		$cellule = '';
		$precedent = '';
		$entete = '';
		$tabDomaine = ['Environnement','Animation', 'Design', 'programmation', 'Intégration'];
		foreach ($tabDomaine as $cle => $valeur)
		{
			$gridArea = '1/' . ($cle+1);
			$entete .= 	'<div style="grid-area:' . $gridArea . '" class="entete">';
			$entete .= '<h2>' . $valeur . '</h2></div>';
		}
		
		while ( have_posts() ) :
			the_post();
			$leTitre =  get_the_title();
			$session = substr($leTitre,4,1);
			$domaine = substr($leTitre,5,1);
			$sigle = substr($leTitre,0,7);
			$gridArea = $session+1 . '/' . $domaine;
			if ($gridArea != $precedent)
			{
				$cellule .= '</div>';
				$cellule .= '<div style="grid-area:' . $gridArea . '" class="domaine_'.$domaine.'">';
			}
			$cellule .= '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" >' . $sigle . '</a>';
			$precedent = $gridArea;
	
		endwhile; // fin de la boucle While.
			$cellule = $entete . substr($cellule,6) . '</div>';
			echo $cellule;
        ?>

        </section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();