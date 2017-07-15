<?php
/**
 * Lazy Load Script to azy load images in the_content()
 * The original code i used for inspiration was https://github.com/MarcDK/Lazy-Loading-Responsive-Images
 & https://florianbrinkmann.de/1122/responsive-images-und-lazy-loading-in-wordpress/
 */
function lazy_load_responsive_images($content)
{
    if (empty($content)) {
        return $content;
    }
    if (is_feed()) {
        return $content;
    }
    if (is_admin()) {
        return $content;
    }
    /* content should always be utf-8. Not setting this attribute results in iso encoding on most installations. */
    $dom = new DOMDocument("1.0", "utf-8");
    libxml_use_internal_errors(true);
    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
    libxml_clear_errors();
    foreach ($dom->getElementsByTagName('img') as $img) {
        if (contains_string($img->getAttribute('class'), "lazy-loaded") !== true)  {
            if ($img->hasAttribute('sizes') && $img->hasAttribute('srcset')) {
                $sizes_attr = $img->getAttribute('sizes');
                $srcset = $img->getAttribute('srcset');
                $img->setAttribute('data-sizes', $sizes_attr);
                $img->setAttribute('data-srcset', $srcset);
                $img->removeAttribute('sizes');
                $img->removeAttribute('srcset');
                $src = $img->getAttribute('src');
                /* if (!$src) {
                    $src = $img->getAttribute('data-noscript');
                } */
                $img->setAttribute('data-src', $src);
            } else {
                $src = $img->getAttribute('src');
                /* if (!$src) {
                    $src = $img->getAttribute('data-noscript');
                } */
                $img->setAttribute('data-src', $src);
            }
            $classes = $img->getAttribute('class');
            // $classes .= " lazyload"; Don't need this in XT
            // $img->setAttribute('class', $classes);
            $img->removeAttribute('src');
            $noscript = $dom->createElement('noscript');
            $noscript_node = $img->parentNode->insertBefore($noscript, $img);
            $noscript_img = $dom->createElement('IMG');
            // $classes = str_replace('lazyload', '', $classes);
            $noscript_img->setAttribute('class', $classes);
            $new_img = $noscript_node->appendChild($noscript_img);
            $new_img->setAttribute('src', $src);
            /* WORK IN PROGRESS TO INCLUDE IMAGE CREDIT
            $imagecreditname = get_post_meta( hrm_get_image_id($src), 'hrm_attachment_photo_credit', true );
            $imagecrediturl = get_post_meta( hrm_get_image_id($src), 'hrm_attachment_photo_credit_url', true );
            if ( $imagecrediturl ){
            $img_credit_container = $dom->createElement('a', 'Photo Credit');
            $img_credit_container->setAttribute('href', $imagecrediturl);
            $img_credit_container->setAttribute('class', 'hrm-small');
            $img_credit_container->setAttribute('target', '_blank');
            $img_credit_node = $img->parentNode->insertBefore($img_credit_container, $img);
            } */
            $content = $dom->saveHTML();
        }
    }
    return $content;
}
add_filter('the_content', 'lazy_load_responsive_images', 45);

function contains_string($haystack, $needle)
{
    if (strpos($haystack, $needle) !== FALSE)
        return true;
    else
        return false;
}

// From https://pippinsplugins.com/retrieve-attachment-id-from-image-url/
// retrieves the attachment ID from the file URL
function hrm_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

// Not using this thumbnail replace in this theme at present:
/*
function lazy_load_responsive_images_modify_post_thumbnail_attr($attr, $attachment, $size)
{
    if (is_feed()) {
        return $attr;
    }

    if (is_admin()) {
        return $attr;
    }

    if (isset($attr['sizes'])) {
        $data_sizes = $attr['sizes'];
        unset($attr['sizes']);
        $attr['data-sizes'] = $data_sizes;
    }

    if (isset($attr['srcset'])) {
        $data_srcset = $attr['srcset'];
        unset($attr['srcset']);
        $attr['data-srcset'] = $data_srcset;
        $attr['data-noscript'] = $attr['src'];
        $attr['data-src'] = $attr['src'];
        unset($attr['src']);
    }

    $attr['class'] .= ' lazyload';

    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'lazy_load_responsive_images_modify_post_thumbnail_attr', 20, 3);

function lazy_load_responsive_images_filter_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr)
{
    if (empty($html)) {
        return $html;
    }

    if (is_feed()) {
        return $html;
    }

    if (is_admin()) {
        return $html;
    }

    $dom = new DOMDocument("1.0", "utf-8");
    libxml_use_internal_errors(true);
    $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
    libxml_clear_errors();


    foreach ($dom->getElementsByTagName('img') as $img) {
        $src = $img->getAttribute('data-noscript');
        $classes = $img->getAttribute('class');
    }

    $classes = str_replace('lazyload', '', $classes);
    $noscript_element = "<noscript><img src='" . $src . "' class='" . $classes . "'></noscript>";
    $html .= $noscript_element;

    return $html;
}

add_filter('post_thumbnail_html', 'lazy_load_responsive_images_filter_post_thumbnail_html', 10, 5); 
*/

// Script to make all video's in $content automatically phased to make them lazy loaded with data-src att. Inspired by the above script
function lazy_load_iframe_embed_video($content)
{
    if (empty($content)) {
        return $content;
    }
    if (is_feed()) {
        return $content;
    }
    if (is_admin()) {
        return $content;
    }
    if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "googlebot"))
    {
        return $content;
    }
    if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "msnbot"))
    {
        return $content;
    }
    /* content should always be utf-8. Not setting this attribute results in iso encoding on most installations. */
    $dom = new DOMDocument("1.0", "utf-8");
    libxml_use_internal_errors(true);
    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
    libxml_clear_errors();
    foreach ($dom->getElementsByTagName('iframe') as $iframe) {
        if (contains_string($iframe->getAttribute('src'), "youtube") || contains_string($iframe->getAttribute('src'), "youtu") || contains_string($iframe->getAttribute('src'), "vimeo") ) {
            if (contains_string($iframe->getAttribute('class'), "lazy-loaded") !== true)  {
                $src = $iframe->getAttribute('src');
                $iframe->setAttribute('data-src', $src);
                $classes = $iframe->getAttribute('class');
                $iframe->removeAttribute('src');
                $noscript = $dom->createElement('noscript');
                $noscript_node = $iframe->parentNode->insertBefore($noscript, $iframe);
                $noscript_iframe = $dom->createElement('div');
                // $classes = str_replace('lazyload', '', $classes);
                $noscript_iframe->setAttribute('class', $classes . 'callout alert');
                $new_iframe = $noscript_node->appendChild($noscript_iframe);
                $noscript_iframe_div_p = $dom->createElement('p', 'There should be a video here, but as javascript is not enabled on your browser the video can not be loaded. However, You can view it here:');
                $new_div = $new_iframe->appendChild($noscript_iframe_div_p);
                preg_match("/(?<=embed\/)(.*)(?=\?feature)/", $src, $ytvideoid_array);
                $noscript_iframe_div_a = $dom->createElement('a', 'https://www.youtube.com/watch/?v=' . $ytvideoid_array[1] . '');
                $noscript_iframe_div_a->setAttribute('href', 'https://www.youtube.com/watch/?v=' . $ytvideoid_array[1] . '');
                $noscript_iframe_div_a->setAttribute('target', '_blank');
                $new_div = $new_iframe->appendChild($noscript_iframe_div_a);
                $content = $dom->saveHTML();

            }
        }
    }
    return $content;
}
add_filter('the_content', 'lazy_load_iframe_embed_video', 46);