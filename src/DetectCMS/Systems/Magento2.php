<?php
namespace DetectCMS\Systems;

class Magento2 extends \DetectCMS\DetectCMS {

	public $methods = array(
		"changelog",
	);

	public $home_html = "";
	public $home_headers = array();
	public $url = "";

	function __construct($home_html, $home_headers, $url) {
    $this->home_html = $home_html;
    $this->home_headers = $home_headers;
		$this->url = $url;
  }

	/**
	 * See if is-downloadable-handler.jsexists, and check for Magento
	 * @return [boolean]
	 */
	public function changelog() {

		if($data = $this->fetch($this->url."/static/adminhtml/Magento/backend/en_US/Magento_Downloadable/js/components/is-downloadable-handler.js")) {

			/**
			 * Changelog always starts from the second line
			 */
			$lines = explode(PHP_EOL, $data);
            if(array_key_exists(1,$lines))
            {
                return strpos($lines[1], "Magento") !== FALSE;
            }


		}

		return FALSE;

	}

	

}
