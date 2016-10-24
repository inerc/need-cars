<?php
class QuickBar {
	public $modx;
	public $config = array();
	function __construct(modX &$modx,array $config = array()) {
		$this->modx =& $modx;
		$basePath = $this->modx->getOption('quickbar.core_path',$config,$this->modx->getOption('core_path').'components/quickbar/');
        $assetsUrl = $this->modx->getOption('quickbar.assets_url',$config,$this->modx->getOption('assets_url').'components/quickbar/');

        $this->config = array_merge(array(
            'basePath' => $basePath,
            'corePath' => $basePath,
            'modelPath' => $basePath.'model/',
            //'processorsPath' => $basePath.'processors/',
            //'templatesPath' => $basePath.'templates/',
            'chunksPath' => $basePath.'elements/chunks/',
            'jsUrl' => $assetsUrl.'js/',
            'cssUrl' => $assetsUrl.'css/',
            'assetsUrl' => $assetsUrl,
            //'connectorUrl' => $assetsUrl.'connector.php',
        ),$config);
        $this->modx->addPackage('quickbar',$this->config['modelPath']);
	}

	public function getChunk($name,$properties = array()) {
	    $chunk = null;
	    if (!isset($this->chunks[$name])) {
	        $chunk = $this->_getTplChunk($name);
	        if (empty($chunk)) {
	            $chunk = $this->modx->getObject('modChunk',array('name' => $name));
	            if ($chunk == false) return false;
	        }
	        $this->chunks[$name] = $chunk->getContent();
	    } else {
	        $o = $this->chunks[$name];
	        $chunk = $this->modx->newObject('modChunk');
	        $chunk->setContent($o);
	    }
	    $chunk->setCacheable(false);
	    return $chunk->process($properties);
	}

	public function parse($tpl, $properties = array() ) {
    	$modChunk = $this->modx->newObject('modChunk');
    	$modChunk->setCacheable(false);
    	$modChunk->setContent($tpl);
    	return $modChunk->process( $properties );
}

	private function _getTplChunk($name,$postfix = '.chunk.tpl') {
	    $chunk = false;
	    $f = $this->config['chunksPath'].strtolower($name).$postfix;
	    if (file_exists($f)) {
	        $o = file_get_contents($f);
	        $chunk = $this->modx->newObject('modChunk');
	        $chunk->set('name',$name);
	        $chunk->setContent($o);
	    }
	    return $chunk;
	}
}