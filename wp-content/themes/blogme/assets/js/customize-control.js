/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function( $, api ) {
    wp.customize.bind('ready', function() {
    	// Show message on change.
        var blogme_settings = ['blogme_slider_num', 'blogme_services_num', 'blogme_projects_num', 'blogme_testimonial_num', 'blogme_blog_section_num', 'blogme_reset_settings', 'blogme_testimonial_num', 'blogme_partner_num'];
        _.each( blogme_settings, function( blogme_setting ) {
            wp.customize( blogme_setting, function( setting ) {
                var ostrichblogNotice = function( value ) {
                    var name = 'needs_refresh';
                    if ( value && blogme_setting == 'blogme_reset_settings' ) {
                        setting.notifications.add( 'needs_refresh', new wp.customize.Notification(
                            name,
                            {
                                type: 'warning',
                                message: localized_data.reset_msg,
                            }
                        ) );
                    } else if( value ){
                        setting.notifications.add( 'reset_name', new wp.customize.Notification(
                            name,
                            {
                                type: 'info',
                                message: localized_data.refresh_msg,
                            }
                        ) );
                    } else {
                        setting.notifications.remove( name );
                    }
                };

                setting.bind( ostrichblogNotice );
            });
        });

        /* === Radio Image Control === */
        api.controlConstructor['radio-color'] = api.Control.extend( {
            ready: function() {
                var control = this;

                $( 'input:radio', control.container ).change(
                    function() {
                        control.setting.set( $( this ).val() );
                    }
                );
            }
        } );

        // Sortable sections
        jQuery( 'ul.blogme-sortable-list' ).sortable({
            handle: '.blogme-drag-handle',
            axis: 'y',
            update: function( e, ui ){
                jQuery('input.blogme-sortable-input').trigger( 'change' );
            }
        });

        // Sortable sections
        jQuery( "body" ).on( 'hover', '.blogme-drag-handle', function() {
            jQuery( 'ul.blogme-sortable-list' ).sortable({
                handle: '.blogme-drag-handle',
                axis: 'y',
                update: function( e, ui ){
                    jQuery('input.blogme-sortable-input').trigger( 'change' );
                }
            });
        });

        /* On changing the value. */
        jQuery( "body" ).on( 'change', 'input.blogme-sortable-input', function() {
            /* Get the value, and convert to string. */
            this_checkboxes_values = jQuery( this ).parents( 'ul.blogme-sortable-list' ).find( 'input.blogme-sortable-input' ).map( function() {
                return this.value;
            }).get().join( ',' );

            /* Add the value to hidden input. */
            jQuery( this ).parents( 'ul.blogme-sortable-list' ).find( 'input.blogme-sortable-value' ).val( this_checkboxes_values ).trigger( 'change' );

        });

        // Deep linking for counter section to about section.
        jQuery('.blogme-edit').click(function(e) {
            e.preventDefault();
            var jump_to = jQuery(this).attr( 'data-jump' );
            wp.customize.section( jump_to ).focus()
        });
    });
})( jQuery, wp.customize );
