<?php /*Template Name: Actualités*/ ?>
<?php get_header(); //appel du template header.php  
?>
<main class="actualites">
    <section class="first-section">
        <svg id="next-button" class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
            <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z" fill="#6D9896" />
        </svg>
        <svg class="arrow" id="prev-button" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
            <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6 1.41-1.41z" fill="#6D9896" />
        </svg>
        <div class="filters">
            <p class="montserrat">Filtres :</p>
            <a href="<?php the_permalink() ?>" class="montserrat <?php echo $_GET['filter'] == null ? 'bold' : ' ' ?>">Toute l'actualité</a>

            <?php
            foreach (get_terms('event') as $taxos) {
                $class = $_GET['filter'] === $taxos->slug ? 'bold' : '';
                $url = add_query_arg('filter', urlencode($taxos->slug));
                echo '<a href="' . $url . '" class="montserrat ' . $class . '" >' . $taxos->name . '</a>';
            }

            ?>
        </div>
        <div class="slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <?php
                    function getAllTaxosSlug()
                    {
                        $allTaxos = [];
                        foreach (get_terms('event') as $taxos) {
                            array_push($allTaxos, $taxos->slug);
                        };
                        return $allTaxos;
                    }

                    $taxos = $_GET['filter'] === null ? getAllTaxosSlug() : $_GET['filter'];

                    $the_query = new WP_Query([
                        'post_type' => 'actuality',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'event',
                                'field' => 'slug',
                                'terms' => $taxos,
                            ),
                        ),
                    ]);

                    // The Loop
                    if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                    ?>

                            <div class="swiper-slide">
                                <div class="img-wrapper">
                                    <?php the_post_thumbnail() ?>
                                </div>
                                <div class="text">
                                    <div class="infos">
                                        <p class="date montserrat"><?php echo get_the_date() ?></p>
                                        <h2 class="stolz"><?php the_title() ?></h2>
                                        <p class="montserrat"> <?php echo get_the_excerpt() ?> </p>
                                    </div>
                                    <a class="montserrat" href="<?php the_permalink() ?>">Voir le compte-rendu</a>
                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        echo "<p>Pas d'actualité</p>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
</main>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        direction: 'horizontal',
        slidesPerView: 1,
        spaceBetween: 80,
        grabCursor: true
    })

    document.getElementById('next-button').addEventListener('click', () => {
        mySwiper.slideNext();
    });

    document.getElementById('prev-button').addEventListener('click', () => {
        mySwiper.slidePrev();
    });
</script>
<?php get_footer(); //appel du template footer.php
