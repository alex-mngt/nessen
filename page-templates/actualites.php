<?php /*Template Name: Actualités*/?>
<?php get_header(); //appel du template header.php  ?>
<main class="actualites">
    <section class="first-section">
        <div class="filters">
            <p>Filtres :</p>
        <?php
foreach (get_terms('event') as $taxos) {

    $url = add_query_arg('filter', urlencode($taxos->slug));
    echo "<a href='" . $url . "'>" . $taxos->name . "</a>";
}
?>

            <a href="<?php the_permalink()?>">Toute l'actualité</a>
        </div>

    </section>
</main>
<?php get_footer(); //appel du template footer.php
