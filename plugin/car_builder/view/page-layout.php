<?php
session_start();

require_once(plugin_dir_path(__FILE__) . '..\functions.php');
require_once(plugin_dir_path(__FILE__) . '..\includes\data.php');



/* Template Name: Form Page */
// Template Post Type: builder_form
?>
<?php get_header(); ?>

<?php astra_entry_before(); ?>
<article <?php
            echo astra_attr(
                'article-page',
                array(
                    'id'    => 'post-' . get_the_id(),
                    'class' => join(' ', get_post_class()),
                )
            );
            ?>>
    <?php astra_entry_top(); ?>

    <!-- Content -->
    <main>
        <article class="post-1814 page type-page status-publish ast-article-single" id="post-1814" itemtype="https://schema.org/CreativeWork" itemscope="itemscope">


            <header class="entry-header ast-no-thumbnail ast-no-title ast-header-without-markup">
            </header> <!-- .entry-header -->


            <div class="entry-content clear" itemprop="text">
                <div class="uagb-container-inner-blocks-wrap">
                    <h1 class="entry-title">Get started with Bootstrap</h1>
                    <p class="uagb-ifb-desc">Customize your car right now with our car builder</p>
                    <form method="post" action="" onsubmit="useValue(event);">
                        <div class="mb-3 form-check">
                            <select id="data_posted">
                                <?php echo get_data($array, null, 1, null); ?>
                            </select>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary">Next</button>
                        </div>

                    </form>
                </div>
            </div>
        </article>
    </main>
    <?php
    astra_edit_post_link(
        sprintf(
            /* translators: %s: Name of current post */
            esc_html__('Edit %s', 'astra'),
            the_title('<span class="screen-reader-text">"', '"</span>', false)
        ),
        '<footer class="entry-footer"><span class="edit-link">',
        '</span></footer><!-- .entry-footer -->'
    );
    ?>

    <?php astra_entry_bottom(); ?>

</article><!-- #post-## -->

<?php astra_entry_after(); ?>

<?php get_footer(); ?>