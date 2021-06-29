<?php
/**
 * popular post widgets 
 *
 * @package Blogme 
 */

if ( ! class_exists( 'Blogme_Popular_Post' ) ) :

     
    class Blogme_Popular_Post extends WP_Widget {
        /**
         * Sets up the widgets name etc
         */
        public function __construct() {
            $tidget_popular_post = array(
                'classname'   => 'widget_popular_post',
                'description' => esc_html__( 'Retrive Popular Posts.', 'blogme' ),
            );
            parent::__construct( 'blogme_Popular_post', esc_html__( 'TO : Popular Posts', 'blogme' ), $tidget_popular_post );
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {
            // outputs the content of the widget
            if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $title  = ( ! empty( $instance['title'] ) ) ? ( $instance['title'] ) : '';
            $title  = apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $tumber = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
            $tategory = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';

            echo $args['before_widget'];
                if ( ! empty( $title ) ) {
                    echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
                }
            $popular_args = array(
                'post_type'         => 'post',
                'posts_per_page'    => absint($tumber),
                'order'             => 'DESC',
                'cat'               => absint( $tategory ),
                );

            echo '<ul>';
            $wp_query = get_posts( $popular_args );
            $count = 1;
            foreach ( $wp_query as $post ) :
            ?>

                <li>
                    <span class="post-number"><?php echo $count++; ?></span>
                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink( $post->ID ); ?>"><?php echo esc_html( $post->post_title ); ?></a></h2>
                        </header>

                        <div class="entry-meta">
                         <?php blogme_posted_on(); ?>
                     </div><!-- .entry-meta -->
                 </div><!-- .entry-container -->
             </li>

            <?php
            endforeach;
            echo '</ul>';
            echo $args['after_widget'];
        }

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            $title      = isset( $instance['title'] ) ? ( $instance['title'] ) : esc_html__( 'Latest Posts', 'blogme' );
            $tumber     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
            $tategory   = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
           ?>

           <p>
               <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'blogme' ); ?></label>
               <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
           </p>

           <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'blogme' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="7" value="<?php echo absint( $tumber ); ?>" size="3" />
           </p>

           <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'blogme' ); ?></label>
                <select id="<?php echo esc_attr( $this->get_field_id('category') ); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width:100%;">

                    <?php 
                    $categories = blogme_category_choices();
                    foreach($categories as $category => $value) { ?>
                    <option value="<?php echo absint( $category ); ?>" <?php selected( $tategory, $category ); ?>><?php echo esc_html( $value ); ?></option>
                    <?php } ?>      
                </select>
            </p>

           <?php
        }

        /**
        * Processing widget options on save
        *
        * @param array $new_instance The new options
        * @param array $old_instance The previous options
        */
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
            $instance           = $old_instance;
            $instance['title']  = sanitize_text_field( $new_instance['title'] );
            $instance['number'] = (int) $new_instance['number'];
            $instance['category'] = (int)  $new_instance['category'] ;
           
            return $instance;
        }
    }
endif;
