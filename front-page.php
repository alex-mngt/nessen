<?php get_header(); ?>
<main class="front-page">
    <section class="first-section">
        <div class="img-wrapper">
            <?php echo wp_get_attachment_image(18, 'full') ?>
        </div>
        <div class="section-number">
            <p class="montserrat">01</p>
            <div class="line"></div>
        </div>
        <h1 class="catchphrase stolz"><?php echo get_theme_mod('front_page_slogan', 'Faisons de Paris <br><span>la première Eco-City !') ?></h1>
        <!-- <h1 class="catchphrase stolz">Faisons de Paris <br><span>la première Eco-City !</span></h1> -->
    </section>

    <section class="second-section">
        <div class="section-number">
            <p class="montserrat">02</p>
            <div class="line"></div>
        </div>
        <div class="text">
            <p class="number stolz"><span class="value"><?php echo get_theme_mod('front_page_chiffre', '280') ?></span> <span><?php echo get_theme_mod('front_page_unit', 'Millions') ?></span></p>
            <p class="paragraph montserrat">
                <?php echo get_theme_mod('front_page_data_explanation', "C'est le nombre de réfugiés climatiques d'ici à 2050 si la hausse des températures est maintenue sous le cap des 2°C. Face à ces enjeux majeurs, les mégalopoles ne peuvent se permettre de rester sans agir ! Pour le futur de notre planète, agissons ensemble et faisons de Paris un exemple international. En respectant des normes d'urbanisation responsables, en mettant en avant des initatives sociales et se sensibilisant a un mode de vie durable, Paris pourrait devenir d'ici 2030 la première mégalopole mondiale au bilan carbone neutre.") ?>
            </p>
            <button class="stolz">Découvrir le programme</button>
        </div>
    </section>
    <section class="third-section">
        <div class="actuality">
            <?php

            $the_query = new WP_Query([
                "posts_per_page" => 1,
                'post_type' => 'actuality',
            ]);

            // The Loop
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
            ?>
                    <p class="title stolz"> <?php echo get_the_title(); ?></p>
                    <div class="img-wrapper">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <p class="excerpt montserrat"> <?php echo get_the_excerpt(); ?></p>
                    <a class="link montserrat" href="<?php echo get_permalink(); ?>">Voir le compte-rendu</a>';
            <?php
                }
            } else {
                echo "<p>Pas d'actualité</p>";
            }

            ?>
        </div>
        <div class="section-number">
            <p class="montserrat">03</p>
            <div class="line"></div>
        </div>
    </section>
</main>

<script>
    let number = document.querySelector('.second-section>.text>.number>.value');
    let value = parseInt(number.textContent, 10);
    number.textContent = '0';
    number.parentNode.style.visibility = 'visible';
    let animationDone = false;

    window.addEventListener('scroll', () => {
        if (window.scrollY + window.innerHeight > number.getBoundingClientRect().top && !animationDone) {
            setTimeout(() => {
                animateNumber();
            }, 1000);
            animationDone = true;
        }
    });

    function animateNumber() {
        let animDuration = 2000;
        let cpt = 0;
        setInterval(() => {
            if (cpt <= value) {
                number.textContent = cpt;
                cpt++
            }
        }, animDuration / number);
    }

    let sectionNumbers = document.getElementsByClassName('section-number');
    console.log(sectionNumbers);

    document.addEventListener('scroll', () => {
        for (let i = 0; i <= sectionNumbers.length - 1; i++) {
            console.log(i);

            if (window.scrollY > window.innerHeight * i && window.scrollY < window.innerHeight * (i + 1)) {
                sectionNumbers[i].style.transform = `translateY(${-(window.innerHeight * i - window.scrollY)/3 }px)`
            }
        }
    })
</script>

<?php get_footer(); ?>