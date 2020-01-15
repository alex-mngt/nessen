<?php get_header(); //appel du template header.php  ?>
<main class="front-page">
    <section class="first-section">
        <div class="img-wrapper">
            <?php echo wp_get_attachment_image(18, 'full') ?>
        </div>
        <div class="section-number">
            <p>01</p>
            <div class="line"></div>
        </div>
        <h1 class="catchphrase">Faisons de Paris <br><span>la première Eco-City !</span></h1>
    </section>

    <section class="second-section">
        <div class="section-number">
            <p>02</p>
            <div class="line"></div>
        </div>
        <div class="text">
            <p class="number">280 Millions</p>
            <p class="paragraph">
            C'est le nombre de réfugiés climatiques d'ici à 2050 si la hausse des températures est maintenue sous le cap des 2°C. Face à ces enjeux majeurs, les mégalopoles ne peuvent se permettre de rester sans agir ! Pour le futur de notre planète, agissons ensemble et faisons de Paris un exemple international. En respectant des normes d'urbanisation responsables, en mettant en avant des initatives sociales et se sensibilisant a un mode de vie durable, Paris pourrait devenir d'ici 2030 la première mégalopole mondiale au bilan carbone neutre.
            </p>
            <button>Découvrir le programme</button>
        </div>
    </section>
    <section class="third-section">
        <div class="actuality">
        <?php

$the_query = new WP_Query([
    "post_per_page" => 1,
    'post_type' => 'report',
]);

// The Loop
if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
        $the_query->the_post();
        echo '<p class="title">' . get_the_title() . '</p>';
        echo '<div class="img-wrapper">';
        the_post_thumbnail('full');
        echo '</div>';
        echo '<p class="excerpt">' . get_the_excerpt() . '</p>';
        echo '<a class="link" href="' . get_permalink() . '">Voir le compte-rendu</a>';
    }
} else {
    echo "<p>Pas d'actualité</p>";
}

?>
        </div>
        <div class="section-number">
            <p>03</p>
            <div class="line"></div>
        </div>
    </section>
</main>

<?php get_footer(); //appel du template footer.php ?>