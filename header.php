<?php
header("Content-Type: text/html; charset=UTF-8");
/**
 * @package {Project Name}
 * @category Main theme files
 * @author Sergio Costa
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <script>
        var baseUrl = "<?php echo WP_SITE_URL; ?>";
    </script>
    <!--[if lt IE 9]>
       <script type="text/javascript"> window.location.href = baseUrl + "/ie/index.html"; </script>
    <![endif]-->

    <?php
        // General Variables
        $title_default = WP_SITE_NAME;
        $keys_default  = '';
        $link_default  = WP_SITE_URL;
        $desc_default  = get_bloginfo('description');
        $image_default = WP_THEME_URL . '/screenshot.png';
        if (is_single() || is_page()) {
            $title_default = get_the_title($post->ID);
            $link_default  = get_permalink();
            if(has_post_thumbnail()){
                $image_ID      = get_post_thumbnail_id(get_the_id());
                $image_default = wp_get_attachment_image_src($image_ID, 'thumbnail');
                $image_default = $image_default[0];
            } else {
                $image_default = WP_THEME_URL . '/screenshot.png';
            }
        }
    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="text/plain" rel="author" href="<?php echo WP_THEME_URL; ?>/humans.txt" />
    <meta name="copyright" content="&copy; Copyright <?php echo date('Y'); ?> <?php echo $title_default; ?>" />
    <meta name="keywords" content="<?php echo $keys_default; ?>, <?php if($posttags){foreach($posttags as $tag){echo $tag->name . ', ';}}; ?>" />
    <meta name="description" content="<?php echo $desc_default; ?>" />
    <?php
        if(is_single() || is_page() || is_category() || is_home()) {
            echo '<meta name="robots" content="all,noodp" />';
            echo "\n";
        }
        else if(is_archive()) {
            echo '<meta name="robots" content="noarchive,noodp" />';
            echo "\n";
        }
        else if(is_search() || is_404()) {
            echo '<meta name="robots" content="noindex,noarchive" />';
            echo "\n";
        }

        if (wp_is_mobile()) { ?>
            <link rel="apple-touch-icon" href="<?php echo WP_THEME_URL; ?>/assets/img/icons/apple-touch-icon.png">
            <link rel="apple-touch-icon" sizes="72x72" href="<?php echo WP_THEME_URL; ?>/assets/img/icons/apple-touch-icon-72x72.png">
            <link rel="apple-touch-icon" sizes="114x114" href="<?php echo WP_THEME_URL; ?>/assets/img/icons/apple-touch-icon-114x114.png">
            <link rel="apple-touch-icon" sizes="144x144" href="<?php echo WP_THEME_URL; ?>/assets/img/icons/apple-touch-icon-144x144.png">
    <?php } else { ?>
            <link rel="shortcut icon" href="<?php echo WP_THEME_URL; ?>/assets/img/icons/favicon.png" type="image/x-icon">
    <?php } ?>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


    <?php
    /**
     * Theme SEO
     */
    $republitheme_seo = get_option('republitheme_seo'); ?>
    <!-- Código do Schema.org também para o Google+ -->
    <meta itemprop="name" content="<?php echo $title_default; ?>">
    <meta itemprop="description" content="<?php echo $desc_default; ?>">
    <meta itemprop="image" content="<?php echo $image_default; ?>">

    <!-- Open Graph Meta Data -->
    <meta property="og:title" content="<?php echo $title_default; ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo $link_default; ?>"/>
    <meta property="og:image" content="<?php echo $image_default; ?>"/>
    <meta property="og:site_name" content="<?php echo $title_default; ?>"/>
    <meta property="og:description" content="<?php echo $desc_default; ?>"/>

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@repubinterativa">
    <meta name="twitter:title" content="<?php echo $title_default; ?>">
    <meta name="twitter:description" content="<?php echo $desc_default; ?>">
    <meta name="twitter:creator" content="@repubinterativa">
    <meta name="twitter:image" content="<?php echo $image_default; ?>">

    <!-- Google Geo Location Meta Data -->
    <meta name="geo.region" content="BR-BA" />
    <meta name="geo.placename" content="Salvador" />
    <meta name="geo.position" content="-12.981192;-38.437129" />
    <meta name="ICBM" content="-12.981192, -38.437129" />

    <!-- Dublin Core Meta Data -->
    <meta name="dc.language" content="PT-BR">
    <meta name="dc.creator" content="<?php echo $mtitle_default; ?>">
    <meta name="dc.publisher" content="<?php echo $mtitle_default; ?>">
    <meta name="dc.source" content="<?php echo $home_default; ?>">
    <meta name="dc.relation" content="<?php echo $link_default; ?>">
    <meta name="dc.title" content="<?php echo $title_default; ?>">
    <meta name="dc.keywords" content="<?php echo $keys_default; ?>, <?php if($posttags){foreach($posttags as $tag){echo $tag->name . ', ';}}; ?>">
    <meta name="dc.subject" content="Desenvolvimento web e mobile (Web and mobile development)">
    <meta name="dc.description" content="<?php echo $desc_default; ?>">

    <?php wp_head(); ?>
</head>
    <body <?php body_class(); ?>>





























        
