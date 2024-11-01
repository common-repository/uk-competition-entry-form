<?php
/*
Plugin Name: UK Competition Entry Widget 
Plugin URI: http://www.sms-affiliate.co.uk/compplugin/
Description: Easily add great competitions to your site with this widget. Prizes updated regularly with fantastic prizes to be won. This plugin adds a widget to your Appearance menu which you can add anywhere
Version: 1.0 
Author: Gary Solomon 
Author URI: http://www.sms-affiliate.co.uk/compplugin/
License: GPLv2 or later
*/
 
 
class CompetitionWidget extends WP_Widget
{
  function CompetitionWidget()
  {
    $widget_ops = array('classname' => 'CompetitionWidget', 'description' => 'Let your users enter competitions to win amazing prizes' );
    $this->WP_Widget('CompetitionWidget', 'Competitions for prizes', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title ."<h1>". $title ."</h1>". $after_title;;
	//echo "<h1>Enter our competition</h1>";
 
    // WIDGET CODE GOES HERE
	$ussit=substr(get_site_url(),7);
 	echo '<iframe src="http://www.email2win.co.uk/plugin/index.php?s='.$ussit.'" width="100%" height="359" scrolling="no" frameborder="no"></iframe>';
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("CompetitionWidget");') );?>