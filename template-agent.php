<?php
/**
 * Template Name: Agent Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package luso
 */

get_header();
?>
    <!-- /.staff-area start -->
    <section class="find-agent-area inner-page-wrapper">
        <div class="container">
            <!--<div class="row mb-5">-->
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12 m-auto">
                    <header class="text-center">
                        <h2 class="section-title"><?php the_title();?></h2>
                    </header>
                    <div class="content mt-5 agent-find-form">
                        <form action="" method="post">
                            <div class="row form-group">
                                <div class="col-lg-7 col-md-6 col-sm-12 text-lg-left text-md-left text-sm-center">
                                    <input type="text" class="form-control" name="postcode_search" placeholder="Zip Code" value="">
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-12 text-lg-left text-md-left text-sm-center">
                                    <label for="distance" class="d-inline">WITHIN</label>
                                    <?php
                                    $distance_select = array(
                                        10 => '10 miles',
                                        20 => '20 miles',
                                        50 => '50 miles',
                                        100 => '100 miles',
                                    );
                                    ?>
                                    <select class="form-control d-inline w-50 ml-2 mr-2" id="distance" name="distance">
                                        <?php
                                        foreach( $distance_select as $distance_option => $key ) {
                                            echo '<option value="'.$distance_option.'"'.($_POST['distance'] == $distance_option ? ' selected' : '').'>'.$key.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 text-lg-left text-md-left text-sm-center paagnt">
                                    <a href="javascript:void(0);" class="print-item print-agent"> <svg id="printer" xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"><path id="Path_160" data-name="Path 160" d="M34.994,10.33H33.873V6.006A6.013,6.013,0,0,0,27.867,0H13.133A6.013,6.013,0,0,0,7.127,6.006V10.33H6.006A6.013,6.013,0,0,0,0,16.336v9.609a6.013,6.013,0,0,0,6.006,6.006H7.127V37.4a3.608,3.608,0,0,0,3.6,3.6H30.27a3.608,3.608,0,0,0,3.6-3.6V31.951h1.121A6.013,6.013,0,0,0,41,25.945V16.336A6.013,6.013,0,0,0,34.994,10.33ZM9.529,6.006a3.608,3.608,0,0,1,3.6-3.6H27.867a3.608,3.608,0,0,1,3.6,3.6V10.33H9.529ZM31.471,37.4a1.2,1.2,0,0,1-1.2,1.2H10.73a1.2,1.2,0,0,1-1.2-1.2V25.545H31.471ZM38.6,25.945a3.608,3.608,0,0,1-3.6,3.6H33.873v-4h.721a1.2,1.2,0,0,0,0-2.4H6.406a1.2,1.2,0,0,0,0,2.4h.721v4H6.006a3.608,3.608,0,0,1-3.6-3.6V16.336a3.608,3.608,0,0,1,3.6-3.6H34.994a3.608,3.608,0,0,1,3.6,3.6Z" fill="#7e7e7e"/><path id="Path_161" data-name="Path 161" d="M208.607,353H202.2a1.2,1.2,0,0,0,0,2.4h6.406a1.2,1.2,0,0,0,0-2.4Z" transform="translate(-184.904 -324.732)" fill="#7e7e7e"/><path id="Path_162" data-name="Path 162" d="M208.607,417H202.2a1.2,1.2,0,0,0,0,2.4h6.406a1.2,1.2,0,0,0,0-2.4Z" transform="translate(-184.904 -383.607)" fill="#7e7e7e"/><path id="Path_163" data-name="Path 163" d="M70.045,193H66.2a1.2,1.2,0,0,0,0,2.4h3.844a1.2,1.2,0,0,0,0-2.4Z" transform="translate(-59.795 -177.545)" fill="#7e7e7e"/></svg><span>Print Entire Agent List</span></a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="find-me btn mb-2 w-50">Submit</button>
                            </div>
                        </form>
                    </div>
                    <p class="no-browser-support d-none">Sorry, the Geolocation API isn't supported in Your browser.</p>
                </div>
            </div>

            <div class="row mb-5 d-none naf">
                <div class="col-lg-7 col-md-7 col-sm-12 m-auto text-red text-center">
                    <h3 class="error-text">"There are no agents locally within your Search area. Here is our list of Agents throughout the United States"</h3>
                </div>
            </div>
            <div class="row mb-5 d-none agnt-cmn">
                <div class="col-8 m-auto">
                    <a href="javascript:void(0);" class="print-item__btn print-filter-agent">
                        <svg id="printer" xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"><path id="Path_160" data-name="Path 160" d="M34.994,10.33H33.873V6.006A6.013,6.013,0,0,0,27.867,0H13.133A6.013,6.013,0,0,0,7.127,6.006V10.33H6.006A6.013,6.013,0,0,0,0,16.336v9.609a6.013,6.013,0,0,0,6.006,6.006H7.127V37.4a3.608,3.608,0,0,0,3.6,3.6H30.27a3.608,3.608,0,0,0,3.6-3.6V31.951h1.121A6.013,6.013,0,0,0,41,25.945V16.336A6.013,6.013,0,0,0,34.994,10.33ZM9.529,6.006a3.608,3.608,0,0,1,3.6-3.6H27.867a3.608,3.608,0,0,1,3.6,3.6V10.33H9.529ZM31.471,37.4a1.2,1.2,0,0,1-1.2,1.2H10.73a1.2,1.2,0,0,1-1.2-1.2V25.545H31.471ZM38.6,25.945a3.608,3.608,0,0,1-3.6,3.6H33.873v-4h.721a1.2,1.2,0,0,0,0-2.4H6.406a1.2,1.2,0,0,0,0,2.4h.721v4H6.006a3.608,3.608,0,0,1-3.6-3.6V16.336a3.608,3.608,0,0,1,3.6-3.6H34.994a3.608,3.608,0,0,1,3.6,3.6Z" fill="#7e7e7e"/><path id="Path_161" data-name="Path 161" d="M208.607,353H202.2a1.2,1.2,0,0,0,0,2.4h6.406a1.2,1.2,0,0,0,0-2.4Z" transform="translate(-184.904 -324.732)" fill="#7e7e7e"/><path id="Path_162" data-name="Path 162" d="M208.607,417H202.2a1.2,1.2,0,0,0,0,2.4h6.406a1.2,1.2,0,0,0,0-2.4Z" transform="translate(-184.904 -383.607)" fill="#7e7e7e"/><path id="Path_163" data-name="Path 163" d="M70.045,193H66.2a1.2,1.2,0,0,0,0,2.4h3.844a1.2,1.2,0,0,0,0-2.4Z" transform="translate(-59.795 -177.545)" fill="#7e7e7e"/></svg><span>Print</span></a>
                </div>
            </div>
            <div class="row justify-content-center pb-3 pt-3 d-none agnt agnt-cmn">
                <?php
                $args = array(
                    'role'    => 'agent',
                    'orderby' => 'user_nicename',
                    'order'   => 'ASC'
                );
                $users = get_users( $args );

                if( !empty( $users ) ) :
                    foreach ( $users as $user ) :
                        $image_url = get_avatar_url( $user->ID );
                        $image_url = isset($image_url) ? $image_url : get_bloginfo('template_url').'/images/agent/placeholder.png';
                        $agent_address = get_user_meta( $user->ID, 'agent_address', true );
                        $agent_phone = get_user_meta( $user->ID, 'agent_phone', true );
                        $agent_zipcode = get_user_meta( $user->ID, 'agent_zipcode', true );
                ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                            <figure class="agent-item">
                                <img alt="staff" class="lazy circular-img agent-item__agent-img" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php echo $image_url;?>"/>
                                <figcaption>
                                    <h3 class="agent-item__name"><?php echo esc_html( $user->display_name );?></h3>
                                    <span class="agent-item__designation"><?php echo $agent_address;?></span>
                                    <span class="agent-item__card-number"> <?php echo $agent_phone;?></span>
                                </figcaption>
                            </figure>
                        </div>
                <?php endforeach; endif;?>
            </div>
        </div>
    </section>
    <!-- /.staff-area end -->
    <div class="loader" id="loading">
        <img alt="logo" class="lazy" src="<?php bloginfo('template_url');?>/images/_blank.png" data-src="<?php bloginfo('template_url');?>/images/loader/loader.png"/>
        <figcaption class="pt-5">
            <span class="h3 text-uppercase">Loading</span>
        </figcaption>
    </div>
<?php
get_footer();
