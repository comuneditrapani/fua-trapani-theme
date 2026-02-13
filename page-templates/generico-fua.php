<?php
/*
Template Name: Generico FUA
*/

get_header();

?>

<main id="main">
  <div class="container" id="main-container">

    <div class="row justify-content-center">
      <div class="col-12 col-lg-10">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
      </div>
    </div>

    <div class="row justify-content-center">
      <!-- Colonna contenuto -->
      <div class="col-12 col-lg-10 py-3">

        <header class="mb-4">
          <h1 class="mb-2"><?php the_title(); ?></h1>
        </header>
      </div>
      <div class="col-lg-10 px-lg-4 py-3">
        <?php
          while (have_posts()) {
              the_post();
              the_content();
          }
        ?>
        <section id="head-section">
          <?php
            $persone = dci_get_meta("persone_struttura", '', $post->ID);
            if ($persone &&  is_array($persone) && count($persone)) {
          ?>
          <h3 class="mb-4 mt-4 ">Chi ne fa parte</h3>
          <section id="persone_struttura" class="row g-4">
            <?php
                    foreach ($persone as $persona_id) {
            ?>
            <div class="col-lg-4 col-xl-2">
              <?php get_template_part("template-parts/persona/card-ico"); ?>
            </div>
            <?php
                            }
              }
            ?>
          </section>
        </section>
        <section id="head-section">
          <?php
            $con_titolo = true;
            if (is_front_page()) {
                get_template_part("template-parts/luogo/tutti-luoghi");
            }
            get_template_part("template-parts/home/notizie");
          ?>
        </section>
      </div>

    </div>
  </div>
</main>

<?php get_footer(); ?>
