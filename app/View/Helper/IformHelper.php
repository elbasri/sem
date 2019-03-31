<?php
class IFormHelper  extends FormHelper{
	var $helpers = array('Html','Javascript');
	
	
	function selectList($values){
		$ret = array();
		foreach($values as $row) {
			$ret[$row['id']] = $row['name'] ; 
		}
		return $ret ;
	}
	
	function input($fieldName, $options = array()) {
		if(!empty($this->params['named']) && !empty($this->params['named'][$fieldName])){
			$options['value'] = $this->params['named'][$fieldName];
		}
		$fieldType = $fieldName;
		$pos = strrpos($fieldType, '.');
		if(!($pos === false)) $fieldType = substr($fieldType, $pos + 1);
		switch($fieldType){
			case "file":
			case "movie":
			case "image":
			case "thumbnail":
			case "thumb":
			case "logo":
			case "afbeelding":
			case "foto":
                        case "logo_small":
                        case "logo_medium":
                        case "logo_big":
			case "photo":
				$options['type'] = 'file';
				break;
		}
		return parent::input($fieldName, $options);
	}
	/**
	 * Creates file input widget.
	 *
	 * @param string $fieldName Name of a field, like this "Modelname.fieldname", "Modelname/fieldname" is deprecated
	 * @param array $options Array of HTML attributes.
	 * @return string
	 * @access public
	 */
	function file($fieldName, $options = array()) {
		$options = $this->_initInputField($fieldName, array_merge(array('type' => 'text'), $options));
		$code = $this->text($fieldName, $options);
		$fieldType = $fieldName;
		$pos = strrpos($fieldType, '.');
		if(!($pos === false)) $fieldType = substr($fieldType, $pos + 1);
		switch($fieldType){
			case 'image':
			case 'thumbnail':
			case 'thumb':
			case "logo":
			case "afbeelding":
			case "foto":
                        case "logo_small":
                        case "logo_medium":
                        case "logo_big":
			case "photo":
				$type = 'Images';
				$typedir = 'images';
				break;
			case 'movie':
				$type = 'Flash';
				$typedir = 'flash';
				break;
			default:
				$type = 'Files';
				$typedir = 'files';
				break;
		}
		$id = $options['id'];
		$code .= '<script type="text/javascript">';
		$code .= "//<![CDATA[\n";
		$code .= "function openFileBrowser{$id}(){\n";
		$code .= "var url = '{$this->webroot}js/ckfinder/ckfinder.html?type={$type}&action=js&func=SetFileField{$id}';\n";
		$code .= "var sOptions = 'toolbar=no,status=no,resizable=yes,dependent=yes,scrollbars=yes,width=640,height=480';\n";
		$code .= "var oWindow = window.open(url, 'ckfinder', sOptions);\n";
		$code .= "}\n";
		$code .= "function SetFileField{$id}(fileUrl){\n";
		$code .= "var pos = fileUrl.toLowerCase().indexOf('webroot/files/{$typedir}');\n";
		$len = 1 + strlen("webroot/files/{$typedir}");
		$code .= "fileUrl = fileUrl.substr(pos + {$len});\n";
		$code .= "document.getElementById('{$id}').value = fileUrl;\n";
		$code .= "}\n";
		$code .= "//]]>\n";
		$code .= '</script>';
		$code .= '<a href="#" onclick="openFileBrowser'.$id.'(); return false;">Selectionner</a>';
		return $code;
		
	}
	/**
	 * FCK editor instance maken van textfield
	 *
	 * @param string $fieldName
	 * @param array $options
	 * @return string
	 */
	function textarea($fieldName, $options = array()) {
		$code = parent::textarea($fieldName, $options);
		$options = $this->_initInputField($fieldName, $options);
		$did = $options['id'];
		$js = $this->webroot.'js/fck/';
		$code .= '<script type="text/javascript">'."\n";
		$code .= "fckLoader_{$did} = function () {\n";
    	$code .= "var bFCKeditor_{$did} = new FCKeditor('{$did}');\n";
    	$code .= "bFCKeditor_{$did}.BasePath = '{$js}';\n";
   	 	$code .= "bFCKeditor_{$did}.ToolbarSet = 'Default';\n";
    	$code .= "bFCKeditor_{$did}.ReplaceTextarea();\n";
		$code .= "}\n";
		$code .= "fckLoader_{$did}();\n";
		$code .= "</script>";
		return $code;
	}
	
	

	
	
	
	
	
	
	function editor($fieldName, $options = array()){
	   $mypath=$this->Html->url('/');
		$mypath.="js/ckeditor/app.config.js";
		$defaults = array(
 			'customConfig' => "$mypath",
 			'loadFinder' => true
 		);
		$options = array_merge($defaults, $options);
	 	$fieldId = $this->domId($fieldName);
	 	$loadFinder = $options['loadFinder'];
	 	unset($options['loadFinder']);
		$script = "\tvar ck_$fieldId = CKEDITOR.replace('$fieldId', {$this->Javascript->object($options)});";
		if($loadFinder)
		{
		$mypath=$this->Html->url('/');
		$mypath.="js/ckfinder/";
			$script .= "\n\tCKFinder.setupCKEditor(ck_$fieldId, '$mypath');";
		}
		return $this->Html->scriptBlock($script);
	}
	
	
	
  function end_($title='Enregistrer'){
	  $ret =  '<div class="submit" style="float:left;clear:both"><button class="btn btn-grey btn-small" type="submit">'.$title.'</button></div>';
	  $ret = $ret.'</form>';
	  return $ret;
  }
  
  
  function input_search($model,$url='',$displayField='name',$options=array()){
	if (empty($url)){$url='/'.strtolower($model).'s/search';  }
	$fieldValue = strtolower($model).'_id';
	
	$output ='<div class="x5 text">';
	$output = $output.$this->hidden($fieldValue,array('id'=>'val'.$fieldValue));
	$output=  $output.$this->input_($model.'.'.$displayField,array(
									'id'=>'dis'.$fieldValue,
									'label'=>$model,
									'readonly'=>'readonly',
									'size'=>32,	
									'div'=>false
									));
	$output= $output.$this->Html->link('...',$url,array('id'=>'lnk'.$fieldValue,'class'=>'input_search'));
	$output=$output.'</div>';
	return $output;
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
	
	function input_($fieldName, $options = array()) {
		$this->setEntity($fieldName);

		$options = array_merge(
			array('before' => null, 'between' => null, 'after' => null, 'format' => null),
			$this->_inputDefaults,
			$options
		);

		$modelKey = $this->model();
		$fieldKey = $this->field();
		if (!isset($this->fieldset[$modelKey])) {
			$this->_introspectModel($modelKey);
		}

		if (!isset($options['type'])) {
			$magicType = true;
			$options['type'] = 'text';
			if (isset($options['options'])) {
				$options['type'] = 'select';
			} elseif (in_array($fieldKey, array('psword', 'passwd', 'password'))) {
				$options['type'] = 'password';
			} elseif (isset($this->fieldset[$modelKey]['fields'][$fieldKey])) {
				$fieldDef = $this->fieldset[$modelKey]['fields'][$fieldKey];
				$type = $fieldDef['type'];
				$primaryKey = $this->fieldset[$modelKey]['key'];
			}

			if (isset($type)) {
				$map = array(
					'string'  => 'text',     'datetime'  => 'datetime',
					'boolean' => 'checkbox', 'timestamp' => 'datetime',
					'text'    => 'textarea', 'time'      => 'time',
					'date'    => 'date',     'float'     => 'text'
				);

				if (isset($this->map[$type])) {
					$options['type'] = $this->map[$type];
				} elseif (isset($map[$type])) {
					$options['type'] = $map[$type];
				}
				if ($fieldKey == $primaryKey) {
					$options['type'] = 'hidden';
				}
			}
			if (preg_match('/_id$/', $fieldKey) && $options['type'] !== 'hidden') {
				$options['type'] = 'select';
			}

			if ($modelKey === $fieldKey) {
				$options['type'] = 'select';
				if (!isset($options['multiple'])) {
					$options['multiple'] = 'multiple';
				}
			}
		}
		$types = array('checkbox', 'radio', 'select');

		if (
			(!isset($options['options']) && in_array($options['type'], $types)) ||
			(isset($magicType) && $options['type'] == 'text')
		) {
			$view =& ClassRegistry::getObject('view');
			$varName = Inflector::variable(
				Inflector::pluralize(preg_replace('/_id$/', '', $fieldKey))
			);
			$varOptions = $view->getVar($varName);
			if (is_array($varOptions)) {
				if ($options['type'] !== 'radio') {
					$options['type'] = 'select';
				}
				$options['options'] = $varOptions;
			}
		}

		$autoLength = (!array_key_exists('maxlength', $options) && isset($fieldDef['length']));
		if ($autoLength && $options['type'] == 'text') {
			$options['maxlength'] = $fieldDef['length'];
		}
		if ($autoLength && $fieldDef['type'] == 'float') {
			$options['maxlength'] = array_sum(explode(',', $fieldDef['length']))+1;
		}

		$divOptions = array();
		$div = $this->_extractOption('div', $options, true);
		unset($options['div']);

		if (!empty($div)) {
			$divOptions['class'] = 'input x5';
			$divOptions = $this->addClass($divOptions, $options['type']);
			if (is_string($div)) {
				$divOptions['class'] = $div;
			} elseif (is_array($div)) {
				$divOptions = array_merge($divOptions, $div);
			}
			if (
				isset($this->fieldset[$modelKey]) &&
				in_array($fieldKey, $this->fieldset[$modelKey]['validates'])
			) {
				$divOptions = $this->addClass($divOptions, 'required');
			}
			if (!isset($divOptions['tag'])) {
				$divOptions['tag'] = 'div';
			}
		}

		$label = null;
		if (isset($options['label']) && $options['type'] !== 'radio') {
			$label = $options['label'];
			unset($options['label']);
		}

		if ($options['type'] === 'radio') {
			$label = false;
			if (isset($options['options'])) {
				$radioOptions = (array)$options['options'];
				unset($options['options']);
			}
		}

		if ($label !== false) {
			$label = $this->_inputLabel($fieldName, $label, $options);
		}

		$error = $this->_extractOption('error', $options, null);
		unset($options['error']);

		$selected = $this->_extractOption('selected', $options, null);
		unset($options['selected']);

		if (isset($options['rows']) || isset($options['cols'])) {
			$options['type'] = 'textarea';
		}

		if ($options['type'] === 'datetime' || $options['type'] === 'date' || $options['type'] === 'time' || $options['type'] === 'select') {
			$options += array('empty' => false);
		}
		if ($options['type'] === 'datetime' || $options['type'] === 'date' || $options['type'] === 'time') {
			$dateFormat = $this->_extractOption('dateFormat', $options, 'MDY');
			$timeFormat = $this->_extractOption('timeFormat', $options, 12);
			unset($options['dateFormat'], $options['timeFormat']);
		}

		$type = $options['type'];
		$out = array_merge(
			array('before' => null, 'label' => null, 'between' => null, 'input' => null, 'after' => null, 'error' => null),
			array('before' => $options['before'], 'label' => $label, 'between' => $options['between'], 'after' => $options['after'])
		);
		$format = null;
		if (is_array($options['format']) && in_array('input', $options['format'])) {
			$format = $options['format'];
		}
		unset($options['type'], $options['before'], $options['between'], $options['after'], $options['format']);

		switch ($type) {
			case 'hidden':
				$input = $this->hidden($fieldName, $options);
				$format = array('input');
				unset($divOptions);
			break;
			case 'checkbox':
				$input = $this->checkbox($fieldName, $options);
				$format = $format ? $format : array('before', 'input', 'between', 'label', 'after', 'error');
			break;
			case 'radio':
				$input = $this->radio($fieldName, $radioOptions, $options);
			break;
			case 'text':
			case 'password':
			case 'file':
				$input = $this->{$type}($fieldName, $options);
			break;
			case 'select':
				$options += array('options' => array());
				$list = $options['options'];
				unset($options['options']);
				$input = $this->select($fieldName, $list, $selected, $options);
			break;
			case 'time':
				$input = $this->dateTime($fieldName, null, $timeFormat, $selected, $options);
			break;
			case 'date':
				$input = $this->dateTime($fieldName, $dateFormat, null, $selected, $options);
			break;
			case 'datetime':
				$input = $this->dateTime($fieldName, $dateFormat, $timeFormat, $selected, $options);
			break;
			case 'textarea':
			default:
				$input = $this->textarea($fieldName, $options + array('cols' => '30', 'rows' => '6'));
			break;
		}

		if ($type != 'hidden' && $error !== false) {
			$errMsg = $this->error($fieldName, $error);
			if ($errMsg) {
				$divOptions = $this->addClass($divOptions, 'error');
				$out['error'] = $errMsg;
			}
		}
		

		$out['input'] = $input;
		$format = $format ? $format : array('before', 'label', 'between', 'input', 'after', 'error');
		$output = '';
		foreach ($format as $element) {
			$output .= $out[$element];
			unset($out[$element]);
		}

		if (!empty($divOptions['tag'])) {
		
			if(isset($options['icon'])){
			$output.= $this->Html->image("/images/icons/".$options['icon']);
			}
			
			$tag = $divOptions['tag'];
			unset($divOptions['tag']);
			$output = $this->Html->tag($tag, $output, $divOptions);
		}
		
		
		return $output;
	}

	
	
	

}
?>