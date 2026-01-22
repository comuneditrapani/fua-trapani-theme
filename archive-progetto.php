<?php
get_header();
?>

<main id="main">
  <div class="container" id="main-container">

    <div class="row">
      <div class="col-12 px-lg-4">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-12 px-lg-4 py-3">
        <h1 class="mb-2">Elenco Progetti</h1>
        <p class="lead mb-4">Elenco dei progetti, con schede di dettaglio.</p>

        <?php if (have_posts()) : ?>
          <div class="row g-3">
            <?php while (have_posts()) : the_post();

              // Campi ACF (adatta i nomi ai tuoi)
              $beneficiario = esc_html(get_field('beneficiario') ?? '');
              $cup        = esc_html(get_field('cup') ?? '');
              $importo    = esc_html(get_field('importo_intervento') ?? 'da definire');
              $avanzamento = esc_html(get_field('avanzamento') ?? '');

              $importo_fmt = is_numeric($importo) ? number_format_i18n((float)$importo, 2) . ' €' : (string)$importo;
            ?>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="card-wrapper card-space h-100">
                  <div class="card card-bg rounded shadow-sm h-100">
                    <div class="card-body d-flex flex-column">

                      <h2 class="h5 card-title mb-2">
                        <a class="text-decoration-none" href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                        </a>
                      </h2>

                      <dl class="row mb-3 small">
                        <dt class="col-5">Beneficiario</dt><dd class="col-7"><?= $beneficiario ?></dd>
                        <dt class="col-5">Importo</dt><dd class="col-7"><?= $importo_fmt ?></dd>
                        <?php if (!empty($avanzamento)) : ?>
                        <dt class="col-5">Avanzamento</dt>
                        <dd class="col-7">
                          <span class="badge bg-primary"><?= $avanzamento ?></span>
                        </dd>
                        <?php endif; ?>
                      </dl>

                      <div class="mt-auto">
                        <a class="btn btn-outline-primary btn-sm" href="<?php the_permalink(); ?>">
                          Vai alla scheda
                        </a>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>

          <div class="mt-4">
            <?php the_posts_pagination(); ?>
          </div>

        <?php else : ?>
          <p class="text-muted">Nessun progetto pubblicato.</p>
        <?php endif; ?>

      </div>
    </div>

  </div>
</main>

<?php get_footer(); ?>
