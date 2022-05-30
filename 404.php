<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package luso
 */

get_header();
?>
    <section class="error-404 not-found about-area inner-page-wrapper common-page-wrapper">
        <div class="container">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'luso' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'luso' ); ?></p>

                    <?php
                    get_search_form();
                    ?>

            </div><!-- .page-content -->
        </div>
    </section><!-- .error-404 -->

<?php
get_footer();
