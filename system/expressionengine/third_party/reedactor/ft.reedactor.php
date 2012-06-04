<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Reedactor Fieldtype Class
*
* @package   Reedactor
* @author    Matt Fordham <matt@revolvercreative.com>
* @copyright Copyright (c) 2012 Revolver Creative
*/

class Reedactor_ft extends EE_Fieldtype {

  var $info = array(
    'name'      => 'Reedactor',
    'version'   => '1.0'
    );

  // --------------------------------------------------------------------

  function display_field($data)
  {
    
    $this->_include_static();
    
    return form_textarea(array(
      'name'  => $this->field_name,
      'id'    => $this->field_id,
      'class' => 'reedactor',
      'rows'  => 20,
      'value' => $data
      ));

  }

  function install()
  {
  }

	function _theme_url()
	{
		if (! isset($this->cache['theme_url']))
		{
			$theme_folder_url = defined('URL_THIRD_THEMES') ? URL_THIRD_THEMES : $this->EE->config->slash_item('theme_folder_url').'third_party/';
			$this->cache['theme_url'] = $theme_folder_url.'reedactor/';
		}
		return $this->cache['theme_url'];
	}

	private function _include_static()
	{
		if (! isset($this->cache['static_included']))
		{
      $this->EE->cp->add_to_head('<link rel="stylesheet" type="text/css" href="'.$this->_theme_url().'redactor/css/redactor.css" />');
      $this->EE->cp->add_to_foot('<script type="text/javascript" src="'.$this->_theme_url().'redactor/redactor.js"></script>');
      $this->EE->cp->add_to_foot('<script type="text/javascript" src="'.$this->_theme_url().'reedactor.js"></script>');
			$this->cache['static_included'] = TRUE;
		}
	}

}

// END Reedactor_ft class
/* End of file ft.reedactor.php */
