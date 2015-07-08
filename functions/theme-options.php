<?php
function republitheme_options() {

    $republitheme_settings = new Republitheme_Theme_Options(
        'republitheme-options', // Slug/ID of the Settings Page 
        'Theme Options', // Settings page name 
        'manage_options' // Page capability 
    );

    $republitheme_settings->set_tabs(
        array(
            array(
                'id' => 'republitheme_general', // Slug/ID of the Settings tab 
                'title' => __( 'Layout Settings', 'republitheme' ), // Settings tab title 
            ),
            array(
                'id' => 'republitheme_slider', // Slug/ID of the Settings tab 
                'title' => __( 'Slider Settings', 'republitheme' ), // Settings tab title 
            ),
            array(
                'id' => 'republitheme_social', // Slug/ID of the Settings tab 
                'title' => __( 'Social Network', 'republitheme' ), // Settings tab title 
            ),
            array(
                'id' => 'republitheme_seo', // Slug/ID of the Settings tab 
                'title' => __( 'SEO', 'republitheme' ), // Settings tab title 
            )
        )
    );

    $republitheme_settings->set_fields(
        array(
            // Configuration tab
            'republitheme_general_fields_section' => array( // Slug/ID of the section 
                'tab'   => 'republitheme_general', // Tab ID/Slug 
                'title' => __( "Configure your theme", 'republitheme' ), // Section title 
                'fields' => array( // Section fields 

                    /**
                     * Inputs
                     */
                    // Logo
                    array(
                        'id'          => 'republitheme_logo', 
                        'label'       => __( 'Main Logo', 'republitheme' ),
                        'type'        => 'image', 
                        'default'     => '', 
                        'description' => __( 'Insert the logotype you want to show into the header of your site', 'republitheme' ), 
                    ),
                    // Retina Logo
                    array(
                        'id'          => 'republitheme_retina_logo', 
                        'label'       => __( 'Main Logo (Retina)', 'republitheme' ),
                        'type'        => 'image', 
                        'default'     => '', 
                        'description' => __( 'Insert the logotype double sized for retina displays', 'republitheme' ), 
                    ),
                    // Layout Style
                    array(
                        'id'          => 'republitheme_layout_style', 
                        'label'       => __( 'Layout style', 'republitheme' ), 
                        'type'        => 'radio', 
                        'default'     => 'fullwidth', 
                        'description' => __( 'Select the layout style you want to your site', 'republitheme' ),
                        'options'     => array( 
                            'fullwidth'   => 'Full Width',
                            'boxed'       => 'Boxed'
                        ),
                    ),
                    // Footer columns
                    array(
                        'id'          => 'republitheme_footer_columns', 
                        'label'       => __( 'Footer columns', 'republitheme' ), 
                        'type'        => 'radio', 
                        'default'     => 'four', 
                        'description' => __( 'How many columns in the footer?', 'republitheme' ),
                        'options'     => array( 
                            'four'    => 4,
                            'three'   => 3,
                            'two'     => 2,
                            'one'     => 1
                        ),
                    ),
                    // Sidebar
                    array(
                        'id'          => 'republitheme_sidebar', 
                        'label'       => __( 'Blog Sidebars', 'republitheme' ), 
                        'type'        => 'radio', 
                        'default'     => 'right', 
                        'description' => __( 'Select where you want your sidebar to appear into post archives and post singles', 'republitheme' ),
                        'options'     => array( 
                            'right'   => 'Right',
                            'left'    => 'Left',
                            'none'    => 'None'

                        ),
                    ),
                    // Primary Color
                    array(
                        'id'          => 'republitheme_primary_color', 
                        'label'       => __( 'Primary Color', 'republitheme' ), 
                        'type'        => 'color', 
                        'default'     => '#ffffff', 
                        'description' => __( 'Choose the primary color for your theme', 'republitheme' ), 
                    ),
                    // Secondary Color
                    array(
                        'id'          => 'republitheme_secondary_color', 
                        'label'       => __( 'Secondary Color', 'republitheme' ), 
                        'type'        => 'color', 
                        'default'     => '#ffffff', 
                        'description' => __( 'Choose the secondary color for your theme', 'republitheme' ), 
                    ),
                    // Thirdary Color
                    array(
                        'id'          => 'republitheme_thirdary_color', 
                        'label'       => __( 'Thirdary Color', 'republitheme' ), 
                        'type'        => 'color', 
                        'default'     => '#ffffff', 
                        'description' => __( 'Choose the thirdary color for your theme', 'republitheme' ), 
                    ),
                    // Primary Titles Color
                    array(
                        'id'          => 'republitheme_primary_titles_color', 
                        'label'       => __( 'Primary Titles Color', 'republitheme' ), 
                        'type'        => 'color', 
                        'default'     => '#ffffff', 
                        'description' => __( 'Choose the color for the primary titles of your site', 'republitheme' ), 
                    ),
                    // Secondary Color
                    array(
                        'id'          => 'republitheme_secondary_titles_color', 
                        'label'       => __( 'Secondary Titles Color', 'republitheme' ), 
                        'type'        => 'color', 
                        'default'     => '#ffffff', 
                        'description' => __( 'Choose the color for the secondary titles of your site', 'republitheme' ), 
                    ),
                    // Paragraph Color
                    array(
                        'id'          => 'republitheme_paragraph_color', 
                        'label'       => __( 'Paragraph Color', 'republitheme' ), 
                        'type'        => 'color', 
                        'default'     => '#ffffff', 
                        'description' => __( 'Choose the color for the paragraphs of your site', 'republitheme' ), 
                    ),
                    // Custom CSS
                    array(
                        'id'          => 'republitheme_custom_css', 
                        'label'       => __( 'Custom CSS', 'republitheme' ), 
                        'type'        => 'textarea', 
                        'attributes'  => array( 
                            'placeholder' => __( '.selector { background: #ccc; }' ),
                            'rows'        => 15
                        ),
                        'description' => __( 'Insert custom css for your theme', 'republitheme' ), 
                    ),
                    // Custom JavaScript / jQuery
                    array(
                        'id'          => 'republitheme_custom_js', 
                        'label'       => __( 'Custom JavaScript / jQuery', 'republitheme' ), 
                        'type'        => 'textarea', 
                        'attributes'  => array( 
                            'placeholder' => __( "$('.selector').hide();" ),
                            'rows'        => 15
                        ),
                        'description' => __( 'Insert custom JavaScript and/or jQuery for your theme', 'republitheme' ), 
                    ),
                ),
            ),

            // Slider
            'republitheme_slider_fields_section' => array( // Slug/ID of the section 
                'tab'   => 'republitheme_slider', // Tab ID/Slug 
                'title' => __( "Configure your slideshow/carousel or static image", 'republitheme' ), // Section title 
                'fields' => array( // Section fields 

                    /**
                     * Inputs
                     */
                    // Slider or image
                    array(
                        'id'          => 'republitheme_slider_image', 
                        'label'       => __( 'Slider or image', 'republitheme' ), 
                        'type'        => 'radio', 
                        'default'     => 'slider', 
                        'description' => __( 'Select the content you want: Slider/Carousel or Static Image', 'republitheme' ),
                        'options'     => array( 
                            'slider'   => 'Slider / Carousel',
                            'image'    => 'Static Image',
                            'none'     => 'None'

                        ),
                    ), 
                    // Slider type
                    array(
                        'id'          => 'republitheme_slider_type', 
                        'label'       => __( 'Slider type', 'republitheme' ), 
                        'type'        => 'radio', 
                        'default'     => 'fullwidth', 
                        'description' => __( 'Select the slider type you want', 'republitheme' ),
                        'options'     => array( 
                            'fullwidth'   => 'Full Width',
                            'block'       => 'Block (only for Full Width site layout)'

                        ),
                    ),                    
                ),
            ),

            // Social tab
            'republitheme_social_fields_section' => array( // Slug/ID of the section 
                'tab'   => 'republitheme_social', // Tab ID/Slug 
                'title' => __( "Insert links to profiles of your social network<br />If you don't use (one or more), just left the associated field empty", 'republitheme' ), // Section title 
                'fields' => array( // Section fields 

                    /**
                     * Inputs
                     */
                    // Facebook
                    array(
                        'id'         => 'republitheme_facebook', 
                        'label'      => __( 'Facebook link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://www.facebook.com/your_facebook_id' )
                        ),
                        'description' => __( 'Insert your Facebook link', 'republitheme' ) 
                    ),
                    // Twitter
                    array(
                        'id'         => 'republitheme_twitter', 
                        'label'      => __( 'Twitter link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://www.twitter.com/your_twitter_id' )
                        ),
                        'description' => __( 'Insert your Twitter link', 'republitheme' ) 
                    ), 
                    // Google Plus
                    array(
                        'id'         => 'republitheme_gplus', 
                        'label'      => __( 'Google+ link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://plus.google.com/+your_google+_id' )
                        ),
                        'description' => __( 'Insert your Google+ In link', 'republitheme' ) 
                    ),
                    // Instagram
                    array(
                        'id'         => 'republitheme_instagram', 
                        'label'      => __( 'Instagram link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://www.instagram.com/your_instagram_id' )
                        ),
                        'description' => __( 'Insert your Instagram link', 'republitheme' ) 
                    ), 
                    // Tumblr
                    array(
                        'id'         => 'republitheme_tumblr', 
                        'label'      => __( 'Tumblr link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://your_tumblr_id.tumblr.com' )
                        ),
                        'description' => __( 'Insert your Tumblr link', 'republitheme' ) 
                    ),  
                    // Flickr
                    array(
                        'id'         => 'republitheme_flickr', 
                        'label'      => __( 'Flickr link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://flickr.com/your_flickr_id' )
                        ),
                        'description' => __( 'Insert your Tumblr link', 'republitheme' ) 
                    ), 
                    // Pinterest
                    array(
                        'id'         => 'republitheme_pinterest', 
                        'label'      => __( 'Pinterest link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://pinterest.com/your_pinterest_id' )
                        ),
                        'description' => __( 'Insert your Pinterest link', 'republitheme' ) 
                    ), 
                    // YouTube
                    array(
                        'id'         => 'republitheme_youtube', 
                        'label'      => __( 'YouTube link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://youtube.com/your_youtube_id' )
                        ),
                        'description' => __( 'Insert your YouTube link', 'republitheme' ) 
                    ),
                    // Vimeo
                    array(
                        'id'         => 'republitheme_vimeo', 
                        'label'      => __( 'Vimeo link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://vimeo.com/your_vimeo_id' )
                        ),
                        'description' => __( 'Insert your Vimeo link', 'republitheme' ) 
                    ),
                    // Linked In
                    array(
                        'id'         => 'republitheme_linkedin', 
                        'label'      => __( 'Linked In link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://www.linkedin.com/profile/view?id=your_linkedin_id' )
                        ),
                        'description' => __( 'Insert your Linked In link', 'republitheme' ) 
                    ),
                    // SlideShare
                    array(
                        'id'         => 'republitheme_slideshare', 
                        'label'      => __( 'SlideShare link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://www.slideshare.net/your_slideshare_id' )
                        ),
                        'description' => __( 'Insert your SlideShare link', 'republitheme' ) 
                    ),
                    // GitHub
                    array(
                        'id'         => 'republitheme_github', 
                        'label'      => __( 'GitHub link', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'https://www.github.com/your_github_id' )
                        ),
                        'description' => __( 'Insert your GitHub link', 'republitheme' ) 
                    ),
                ),
            ),

            // SEO
            'republitheme_seo_fields_section' => array( // Slug/ID of the section 
                'tab'   => 'republitheme_seo', // Tab ID/Slug 
                'title' => __( "Insert all informations for a better SEO of your site", 'republitheme' ), // Section title 
                'fields' => array( // Section fields 

                    /**
                     * Inputs
                     */
                    // Name
                    array(
                        'id'         => 'republitheme_name', 
                        'label'      => __( "Site's name", 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'The Name of my site' )
                        ),
                        'description' => __( 'Insert the name of your site', 'republitheme' ) 
                    ),
                    // Subject
                    array(
                        'id'         => 'republitheme_subject', 
                        'label'      => __( "Site's subject", 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'The subject of my site' )
                        ),
                        'description' => __( 'Insert the subject of your site, directly', 'republitheme' ) 
                    ),
                    // Description
                    array(
                        'id'          => 'republitheme_description', 
                        'label'       => __( 'Description', 'republitheme' ), 
                        'type'        => 'textarea', 
                        'attributes'  => array( 
                            'placeholder' => __( 'The description of my site' )
                        ),
                        'description' => __( 'Describe your site based on the main content of it', 'republitheme' ), 
                    ),
                    // Keywords
                    array(
                        'id'         => 'republitheme_keywords', 
                        'label'      => __( 'Keywords', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'keyword, keyword, keyword' )
                        ),
                        'description' => __( 'Insert keywords <strong>(separated by commas)</strong> based on the main content of your site', 'republitheme' ) 
                    ),
                    // City and State
                    array(
                        'id'         => 'republitheme_city', 
                        'label'      => __( 'City/Town', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( 'Cityland, NY' )
                        ),
                        'description' => __( 'Insert the City/Town where you live or where the company is', 'republitheme' ) 
                    ),
                    // Twitter ID
                    array(
                        'id'         => 'republitheme_twitter_id', 
                        'label'      => __( 'Twitter ID', 'republitheme' ),
                        'type'       => 'text', 
                        'attributes' => array( 
                            'placeholder' => __( '@mytwitter' )
                        ),
                        'description' => __( 'Insert you Twitter ID <strong>with "@"</strong>', 'republitheme' ) 
                    ),
                    // Image for Twitter Card
                    array(
                        'id'          => 'republitheme_twitter_card', 
                        'label'       => __( 'Image for Twitter Card', 'republitheme' ), 
                        'type'        => 'image', 
                        'description' => __( 'Following Twitter recomendations, this image should be at least 435x375 (Pixels)', 'republitheme' ), 
                    ),
                    // Image for Facebook open graph
                    array(
                        'id'          => 'republitheme_open_graph', 
                        'label'       => __( 'Image for Facebook Open Graph', 'republitheme' ), 
                        'type'        => 'image', 
                        'description' => __( 'Following Facebook recomendations, this image should be at least 600x315 (Pixels)', 'republitheme' ), 
                    ),
                ),
            ),
        )
    );
}
add_action( 'init', 'republitheme_options', 1 );