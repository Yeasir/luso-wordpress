<?php
/**
 * View: Default Template for Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/default-template.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

get_header();
?>
    <section class="about-area inner-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                    <?php get_sidebar('common');?>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="tab-content" id="event_tab_content">
                        <?php
                        echo tribe( Template_Bootstrap::class )->get_view_html();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();
