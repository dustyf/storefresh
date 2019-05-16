<?php
FLBuilder::render_module_css(
	'button', $id, array(
		'bg_color'          => $settings->btn_bg_color,
		'bg_hover_color'    => $settings->btn_bg_hover_color,
		'bg_opacity'        => $settings->btn_bg_opacity,
		'bg_hover_opacity'  => $settings->btn_bg_hover_opacity,
		'button_transition' => $settings->btn_button_transition,
		'border_radius'     => $settings->btn_border_radius,
		'border_size'       => $settings->btn_border_size,
		'font_size'         => $settings->btn_font_size,
		'padding'           => $settings->btn_padding,
		'style'             => ( isset( $settings->btn_3d ) && $settings->btn_3d ) ? 'gradient' : $settings->btn_style,
		'text_color'        => $settings->btn_text_color,
		'text_hover_color'  => $settings->btn_text_hover_color,
	)
);
?>

.fl-builder-content .fl-node-<?php echo $id; ?> .heb-hero {
	background-image: url('<?php echo $settings->hero_image_src; ?>');
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
	height: 550px;
	width: 100%;
	padding: 3rem;
}

.fl-builder-content .fl-node-<?php echo $id; ?> .heb-hero .inner {
	position: relative;
	width: 100%;
	height: 100%;
}

.fl-builder-content .fl-node-<?php echo $id; ?> .heb-hero .heb-hero-button-left,
.fl-builder-content .fl-node-<?php echo $id; ?> .heb-hero .heb-hero-button-right {
	position: absolute;
	bottom: 0;
}

.fl-builder-content .fl-node-<?php echo $id; ?> .heb-hero .heb-hero-button-left a,
.fl-builder-content .fl-node-<?php echo $id; ?> .heb-hero .heb-hero-button-right a {
	font-weight: bold;
}

.fl-builder-content .fl-node-<?php echo $id; ?> .heb-hero .heb-hero-button-left {
	left: 0;
}

.fl-builder-content .fl-node-<?php echo $id; ?> .heb-hero .heb-hero-button-right {
	right: 0;
}

.fl-builder-content .fl-node-<?php echo $id; ?> .torn-bottom:after {
	bottom: 0;
}
