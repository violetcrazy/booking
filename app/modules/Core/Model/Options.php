<?php
namespace Core\Model;

use Phalcon\Mvc\Model;

class Options extends Model 
{
	public $id;
	public $key_name;
	public $content_value;
	public $type;

	public function initialize()
	{
	    $this->setSource('crm_options');
	}

	public function beforeValidationOnUpdate()
	{
	    $this->beforeValidationOnCreate();
	}
	public function beforeValidationOnCreate()
	{
		if ($this->type == '') {
			$this->type = 'global';
		}
	}

	public static function getOption($key) {
		$output = Options::findFirst("key_name = '{$key}'");

		if ($output) {
			return $output->content_value;
		} else {
			return '';
		}
	}

	public static function saveOption($key, $content, $type = 'global') {
		$options = Options::findFirst("key_name = '{$key}'");
		if (!$options) {
            $options = new Options();
			$options->key_name = $key;
			$options->$type = $type;
		}

		$options->content_value = $content;

		$options->save();

		return $options;
	}
}
