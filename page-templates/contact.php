<?php /* Template Name: Contact */ ?>
<?php get_header() ?>
<main class="contact">
    <div class="first-section">
        <p class="title stolz">Nous contacter</p>
        <p class="text montserrat">Sur cette page, vous pouvez contacter l’espace opérationnel pour résoudre un problème que vous rencontrez dans votre action. La compte par ailleurs plusieurs espaces, investis de diverses missions, ouverts et joignables par toutes et tous. À ces espaces s’ajoutent quatre comités, l’Assemblée des groupes d’action, et l’Agora politique. L’ensemble de ces espaces et comités peuvent être contactés directement.
        </p>
    </div>
    <div class="second-section">
        <?php echo do_shortcode('[ninja_form id=1]'); ?>
    </div>
</main>
<?php get_footer() ?>