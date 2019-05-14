<?php

class pluginCta extends Plugin {

	private $loadOnController = array(
		'new-content',
		'edit-content'
	);

	public function init() {
		$this->dbFields = array(
			'cta_alignment'=>'left',
			'cta_panel_styles'=>'',
			'cta_headline'=>'',
			'cta_paragraph'=>'',
			'cta_body_text_color'=>'inherit',
			'cta_image'=>'',
			'cta_image_size'=>'cover',
			'cta_image_pos'=>'center',
			'cta_icon_color'=>'#ffffff',
			'cta_btn_text'=>'Learn More',
			'cta_btn_link'=>'#',
		);
	}

	public function form() {
		global $L;

		$html  = '<div id="cta_test" class="alert alert-primary" role="alert">';
		$html .= $this->description();
		$html .= '</div><br>';

		$html .= '<div id="cta_plugin_settings">';
		
		$html .= '<h4>CTA Panel</h4>';

		$html .= '<div class="form-group row">';
		$html .= '<label id="foo" class="col-sm-2 col-form-label" >'.$L->get('Alignment').'</label>';
		$html .= '<div class="col-sm-2">';
		$html .= '<select id="cta_alignment" name="cta_alignment" class="form-control">';
		$html .= '<option value="left" '.($this->getValue('cta_alignment')==='left'?'selected':'').'>Left</option>';
		$html .= '<option value="right" '.($this->getValue('cta_alignment')==='right'?'selected':'').'>Right</option>';
		$html .= '</select>';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="form-group row">';
		$html .= '<label class="col-sm-2 col-form-label">'.$L->get('Panel Styles').'</label>';
		$html .= '<div class="col-sm-6">';
		$html .= '<input id="cta_panel_styles" name="cta_panel_styles" type="text" class="form-control" value="'.$this->getValue('cta_panel_styles').'">';
		$html .= '<span class="tip">'.$L->get('Declare inline CSS styles for main cta panel. Some good gradient backgrounds: ').' <a href="https://uigradients.com/" target="_blank">https://uigradients.com/</a></span>';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<br>';
		$html .= '<h4>Image</h4>';

		$html .= '<div class="form-group row">';
		$html .= '<label class="col-sm-2 col-form-label">'.$L->get('Image URL').'</label>';
		$html .= '<div class="col-sm-6">';
		$html .= '<input id="cta_image" name="cta_image" type="text" class="form-control" value="'.$this->getValue('cta_image').'" placeholder="https://domain.com/img/image.png">';
		$html .= '<span class="tip">'.$L->get('Optional - Leave blank to use icon.').'</span>';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="form-group row">';
		$html .= '<label class="col-sm-2 col-form-label">'.$L->get('Image Size').'</label>';
		$html .= '<div class="col-sm-2">';
		$html .= '<select id="cta_image_size" name="cta_image_size" class="form-control">';
		$html .= '<option value="contain" '.($this->getValue('cta_image_size')==='contain'?'selected':'').'>Contain</option>';
		$html .= '<option value="cover" '.($this->getValue('cta_image_size')==='cover'?'selected':'').'>Cover</option>';
		$html .= '</select>';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="form-group row">';
		$html .= '<label class="col-sm-2 col-form-label">'.$L->get('Image Position').'</label>';
		$html .= '<div class="col-sm-2">';
		$html .= '<select id="cta_image_pos" name="cta_image_pos" class="form-control">';
		$html .= '<option value="top" '.($this->getValue('cta_image_pos')==='top'?'selected':'').'>Top</option>';
		$html .= '<option value="right" '.($this->getValue('cta_image_pos')==='right'?'selected':'').'>Right</option>';
		$html .= '<option value="bottom" '.($this->getValue('cta_image_pos')==='bottom'?'selected':'').'>Bottom</option>';
		$html .= '<option value="left" '.($this->getValue('cta_image_pos')==='left'?'selected':'').'>Left</option>';
		$html .= '<option value="center" '.($this->getValue('cta_image_pos')==='center'?'selected':'').'>Center</option>';
		$html .= '</select>';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<br>';

		$html .= '<div class="form-group row">';
		$html .= '<label class="col-sm-2 col-form-label">'.$L->get('Icon Color').'</label>';
		$html .= '<div class="col-sm-2">';
		$html .= '<input id="cta_icon_color" name="cta_icon_color" type="text" class="form-control" value="'.$this->getValue('cta_icon_color').'">';
		$html .= '<span class="tip">'.$L->get('Color in hex ').'</span>';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<br>';
		$html .= '<h4>Text</h4>';

		$html .= '<div class="form-group row">';
		$html .= '<label class="col-sm-2 col-form-label">'.$L->get('Headline').'</label>';
		$html .= '<div class="col-sm-6">';
		$html .= '<input id="cta_headline" name="cta_headline" type="text" class="form-control" value="'.$this->getValue('cta_headline').'">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="form-group row">';
		$html .= '<label class="col-sm-2 col-form-label">'.$L->get('Paragraph').'</label>';
		$html .= '<div class="col-sm-6">';
		$html .= '<textarea name="cta_paragraph" id="cta_paragraph" class="form-control">'.$this->getValue('cta_paragraph').'</textarea>';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="form-group row">';
		$html .= '<label class="col-sm-2 col-form-label">'.$L->get('Text Color').'</label>';
		$html .= '<div class="col-sm-2">';
		$html .= '<input id="cta_body_text_color" name="cta_body_text_color" type="text" class="form-control" value="'.$this->getValue('cta_body_text_color').'">';
		$html .= '<span class="tip">'.$L->get('Color in hex ').'</span>';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<br>';
		$html .= '<h4>Button</h4>';

		$html .= '<div class="form-group row">';
		$html .= '<label class="col-sm-2 col-form-label">'.$L->get('Button Text').'</label>';
		$html .= '<div class="col-sm-2">';

		$html .= '<input id="cta_btn_text" name="cta_btn_text" type="text" class="form-control" value="'.$this->getValue('cta_btn_text').'">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="form-group row">';
		$html .= '<label class="col-sm-2 col-form-label">'.$L->get('Button Link').'</label>';
		$html .= '<div class="col-sm-6">';

		$html .= '<input id="cta_btn_link" name="cta_btn_link" type="text" class="form-control" value="'.$this->getValue('cta_btn_link').'">';
		$html .= '</div>';
		$html .= '</div>';

		$html .= '</div>';

		$html .= '<br><br>';

		return $html;
	}

	

	public function adminHead()
	{
		$html = $this->includeCSS('plugin-settings.css');
		return $html;

		// Load the plugin only in the controllers setted in $this->loadOnController
		if (!in_array($GLOBALS['ADMIN_CONTROLLER'], $this->loadOnController)) {
			return false;
		}
	}

	public function siteHead()
	{	
		if (in_array($GLOBALS['ADMIN_CONTROLLER'], $this->loadOnController)) {
			return false;
		}

		$html  = $this->includeCSS('cta.css');

		return $html;
	}

	public function beforeSiteLoad()
	{
		global $site;
		global $WHERE_AM_I;
		global $page;
		global $content;

		$svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1850 1850"><path d="M1701.966 409.458q53 0 90.5 37.5t37.5 90.5q0 53-37.5 90.5t-90.5 37.5v384q0 52-38 90t-90 38q-417-347-812-380-58 19-91 66t-31 100.5q2 53.5 40 92.5-20 33-23 65.5t6 58q9 25.5 33.5 55t48 50q23.5 20.5 61.5 50.5-29 58-111.5 83t-168.5 11.5q-86-13.5-132-55.5-7-23-29.5-87.5t-32-94.5q-9.5-30-23-89t-15-101q-1.5-42 3.5-98.5t22-110.5h-122q-66 0-113-47t-47-113v-192q0-66 47-113t113-47h480q435 0 896-384 52 0 90 38t38 90v384zm-128 604v-954q-394 302-768 343v270q377 42 768 341z" fill="'.$this->getValue('cta_icon_color').'"/></svg>';

		switch ($WHERE_AM_I) {
			case 'page':
	
				$html  = '<div class="post-cta post-cta-alignment-'.$this->getValue('cta_alignment').'" style="'.($this->getValue('cta_panel_styles')?$this->getValue('cta_panel_styles'):'background-image: linear-gradient(to right, #E6EDF3 0%, #F1F9E9 100%, #E6EDF3 100%);').'">';
				
				if(Text::isNotEmpty($this->getValue('cta_image'))){
					$html  .= '<div class="post-cta-col d-none d-lg-block" style="flex-basis:40%;background-image: url('.$this->getValue('cta_image').');background-repeat:no-repeat;background-size:'.$this->getValue('cta_image_size').';background-position:'.$this->getValue('cta_image_pos').';">';
				} else {
					$html  .= '<div class="post-cta-col d-none d-lg-block">';
					$html  .= $svg;
				}
				
				$html  .= '</div>';
				$html  .= '<div class="post-cta-col">';
				$html  .= '<h3 style="'.$this->getValue('cta_body_text_color').'">'.$this->getValue('cta_headline').'</h3>';
				$html  .= '<p style="'.$this->getValue('cta_body_text_color').'">'.$this->getValue('cta_paragraph').'</p>';
				$html  .= '<a href="'.$this->getValue('cta_btn_link').'" class="btn btn-default btn-md" target="_blank">'.$this->getValue('cta_btn_text').'</a>';
				$html  .= '</div>';
				$html  .= '</div>';

				break;
		}

		$page->setField('content', $page->content().$html, true);
	}
}