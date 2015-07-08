<?php
function republitheme_user_meta() {
    $user_meta = new Odin_User_Meta(
        'republitheme_usermeta', // User Meta Slug/ID 
        __( 'Aditional Information', 'republitheme' ) // User Meta Name
    );

    $user_meta->set_fields(
        array(
            // Complete Biography
            array(
                'id'          => 'republitheme_usermeta_bio', 
                'label'       => __( 'Complete Biography', 'republitheme' ), 
                'type'        => 'editor', 
                'description' => __( 'Insert your complete biography', 'republitheme' ), 
                'options'     => array( 
                    'textarea_rows' => 10
                ),
            ),
            // Avatar Image
            array(
                'id'          => 'republitheme_usermeta_image', 
                'label'       => __( 'Avatar Image', 'republitheme' ), 
                'type'        => 'image', 
                'default'     => '', 
                'description' => __( "Insert an image for your profile, if you won't use Gravatar<br />If you left empty, will show your Gravatar Image", 'republitheme' ), 
            ),
            // Function
            array(
                'id'          => 'republitheme_function', 
                'label'       => __( 'Function into the team', 'republitheme' ), 
                'type'        => 'text', 
                'attributes' => array( 
                    'placeholder' => __( 'Web Developer' )
                ),
                'description' => __( "Insert your function into the company", 'republitheme' ), 
            ),
            // Skills
            array(
                'id'          => 'republitheme_skills', 
                'label'       => __( 'Professional Skills', 'republitheme' ), 
                'type'        => 'text', 
                'attributes' => array( 
                    'placeholder' => __( 'HTML, CSS, JavaScript, PHP, jQuery, WordPress' )
                ),
                'description' => __( "Insert your professional skills", 'republitheme' ), 
            ),
            // Education
            array(
                'id'          => 'republitheme_education', 
                'label'       => __( 'Education', 'republitheme' ), 
                'type'        => 'text', 
                'attributes' => array( 
                    'placeholder' => __( 'Bachelor in Computer Science' )
                ),
                'description' => __( "Insert your level of education", 'republitheme' ), 
            ),
            // Birth Date
            array(
                'id'          => 'republitheme_usermeta_birth', 
                'label'       => __( 'Birth Date', 'republitheme' ), 
                'type'        => 'input', 
                'description' => __( 'Insert your Birth Date', 'republitheme' ), 
                'attributes'  => array( 
                    'type' => 'date'
                )
            ),
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
        )
    );
}

add_action( 'init', 'republitheme_user_meta', 1 );