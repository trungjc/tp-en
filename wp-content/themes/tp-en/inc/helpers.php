<?php
require_once('aq_resizer.php');
function naming_clazz($str) {
	$str = strtolower($str);
	return str_replace(' ', '-', $str);
}

function wrap_string($str, $tag = 'span', $clazz = ''){
    preg_match_all('/\*.*?\*/', $str, $m, PREG_PATTERN_ORDER);
    $clazz = ($clazz)? " class='$clazz'":"";
    if($m){
        foreach ($m[0] as $item){
            $tmp = "<$tag$clazz>".str_replace("*","", $item)."</$tag>";
            $str = str_replace($item, $tmp, $str);
        }
    }
    return $str;
}

function wrap_br($str){
    if(!$str) return ;
    return str_replace("*","<br/>", $str);
}

function the_text($text, $before = '', $after = ''){
    if($text):
        echo $before;
        echo wrap_string($text);
        echo $after;
    endif;
}

function the_background_color($color = '#FFFFFF', $important = false){
    $style = 'style="background-color:'.$color;
    if($important) $style .= '!important';
    $style .= '"';
    echo $style;
}

function wrap_link($str, $tag = 'span', $link = ''){
    preg_match_all('/\*.*?\*/', $str, $m, PREG_PATTERN_ORDER);
    if($m){
        foreach ($m[0] as $item){
            $tmp = "<$tag$link>".str_replace("*","", $item)."</$tag>";
            $str = str_replace($item, $tmp, $str);
        }
    }
    return $str;
}

function make_term_condition_text($text, $before = '', $after = ''){
    $TCs = get_privacy_policy_url();
    if($text):
        echo $before;
        echo wrap_link($text, 'a', ' target="_blank" href="'. $TCs .'"' );
        echo $after;
    endif;
}

function the_class_css($clazz){
    if($clazz){
        return 'class="'.$clazz. '"';
    }
    return '';
}

function the_image($img, $clazz = '', $style=''){
    if($img['url']){
        echo '<img src="'.$img['url'].'" alt="'.$img['alt'].'" '. the_class_css($clazz) .' style="'.$style.'">';
    }
}

function the_image_resize($img, $width, $height, $clazz=''){
    if($img['url']){
        $img_url = aq_resize($img['url'], $width, $height, true, true, true);
        $img_class = ($clazz != '')?'class="'.$clazz.'"': '';
        echo '<img src="'.$img_url.'" alt="'.$img['alt'].'" '.$img_class.'>';
    }
}

function the_button($button, $cssClass='btn-default', $p=false){
    
    $type = $button['link_type'];
    $url = ($type == 'internal')?$button['internal_link']:$button['external_link'];
    $target = ($type == 'internal')?'':'target="_blank"';
    if(strpos($url, 'http') === false){
        $url = "http://".$url;
    }
    if($url && ($button['label'] != '')){
        if($p){
            echo '<p><a ontouchstart=""  href="'.$url.'" class="btn ' . $cssClass .'" '.$target.'>'.$button['label'].'</a></p>';
        }else{
            echo '<a ontouchstart=""  href="'.$url.'" class="btn '. $cssClass .'" '.$target.'>'.$button['label'].'</a>';
        }
    }
}

function the_link($link, $cssClass='', $icon=false){
	if(isset($link['url'])){
        $icon_img = ($icon)?'<i class="icon-triangle"></i>':'';
		echo '<a  href="'.$link['url'].'" class="'. $cssClass .'" target="'.$link['target'].'" data-wow-duration="1s" data-wow-offset="10">'.$link['title'].' '.$icon_img.'</a>';
	}
}

function the_action_buttons($buttons, $button_clazz = 'btn-default', $before = '<div class="div-cta">', $after = '</div>'){
    if($buttons){
        echo $before;
        foreach ($buttons as $item){
            the_button($item, $button_clazz);
        }
        echo $after;
    }
}

function get_social_link($item){
    if($item['brand'] == 'icon-tel.png'):
        $link = 'tel:'.$item['phone'];
    elseif($item['brand'] == 'icon-email.png'):
        $link = 'mailto:'.$item['email'];
    else:
        $link = $item['link'];
    endif;
    return $link;
}

function get_custom_url($button){
    $type = $button['type'];
    $url = ($type == 'internal')?get_permalink($button['link']):$button['url'];
    if(!$url || $url == '') return false;
    return $url;
}

function the_padding($padding, $inside=false){
    $padding_css = '';
    $padding_top = ($padding['padding_top'] != '')?'padding-top: '.$padding['padding_top']. 'px;':'';
    $padding_bottom = ($padding['padding_bottom'] != '')?'padding-bottom: '.$padding['padding_bottom']. 'px;':'';
    $padding_css .= $padding_top.$padding_bottom;
    $padding_css = (!$inside)?'style="'. $padding_css .'"': $padding_css;
    echo $padding_css;
}

add_filter('the_content', function($content){
   return wrap_string($content);
});

add_filter('the_title', function($title){
    return wrap_string($title);
});

function the_social_share($arr, $post_id, $before = '<div class="heading-blog-right">', $after = '</div>'){
    if(!$arr || !$post_id) return;
    echo $before;
    echo '<ul class="share">';
    $title = urlencode(get_the_title( $post_id ));
    $url = urlencode(get_permalink( $post_id ));
    if(in_array('facebook', $arr)){
        ?>
        <li><a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[url]=<?php echo $url; ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325')" target='_parent' href='javascript: void(0)'><i class='fab fa-facebook-f'></i></a></li>
        <?php
    }
    if(in_array('twitter', $arr)){
        ?>
        <li><a onClick="window.open('https://twitter.com/intent/tweet?original_referer=<?php echo $url;?>&ref_src=twsrc%5Etfw&text=<?php echo $title; ?>&&tw_p=tweetbutton&url=<?php echo $url;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325')" target='_parent' href='javascript: void(0)'><i class="fab fa-twitter"></i></a></li>
        <?php
    }
    if(in_array('email', $arr)){
        ?>
        <li><a href="mailto:?subject=<?php echo get_the_title( $post_id );?>&amp;body=<?php echo $url;?>"><i class="far fa-envelope"></i></a></li>
        <?php
    }
    echo '</ul>';
    echo $after;
}

function get_news_terms($news_id) {
	$terms = get_the_terms( $news_id, 'news-category' );
	return $terms[0];
}

function get_all_news_terms($news_id) {
	$terms = get_the_terms( $news_id, 'news-category' );
	return $terms;
}

function the_news_terms ($news_id, $attr='') {
    $terms = get_all_news_terms($news_id);
    foreach ($terms as $key => $term) {
        $category_landing = get_field('category_landing', 'option')?get_field('category_landing', 'option'):'';
        $term_link = $category_landing.'?category='.$term->slug;
        if($key > 0) echo ", ";
        echo '<a href="'.$term_link.'" '.$attr.'>'.$term->name.'</a>';
    }
}

require_once(get_template_directory() . '/inc/Mobile_Detect.php');

function md_is_mobile() {

  $detect = new Mobile_Detect;

  if( $detect->isMobile() && !$detect->isTablet() ){
    return true;
  } else {
    return false;
  }

}