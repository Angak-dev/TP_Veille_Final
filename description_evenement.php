<?php>
get_header();
?>

<div id="primary" class="content-area ">
		<main id="main" class="site-main ">  
        <section class="desc_event">

        <?php
            setup_postdata($post);
            echo '<div class="desc-event-container">';
            echo '<h3 class="title-event">'.get_the_title().'</h3>';
            echo '<p class="resume">' .get_the_excerpt(). '</p>';
            echo '<p class="date"> Date : '.get_the_date(). '</p>';
            echo '<p class="auteur" > Responsable: '.get_the_author(). '</p>';
            echo '</div>';
        ?>
        <section>
        </main> 
    </div>
<?php
get_footer();
?>