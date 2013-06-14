<?php

class Layout {
	protected $content;
	protected $strings;
	protected $path;
	
	public function Layout($path, $str_path){
		$this->path = $path;
		$this->strings = new StringResource($str_path);
	}
	
	public function SetContentView($view, $isFile = true){
		$this->content = $this->GetContent($view, $isFile);
	}
	
	public function RenderView(){
		echo $this->ReturnView();
	}
	
	public function RenderViewAndExit(){
		$this->RenderView();
		exit();
	}
	
	public function ReturnView(){
		$this->content = preg_replace_callback('/\{{ST:([a-zA-Z0-9_]*)}}/',array($this, 'StringTagReplacer'),$this->content);
		$this->content = preg_replace('/\{{ID:([a-zA-Z0-9_]*)}}/','',$this->content);	
		return $this->content;
	}
	
	public function AddContentById($id, $view){
		$pattern = "/\{{ID:$id}}/";
		$this->content = preg_replace($pattern,$view,$this->content);
	}
	
	public function BatchAddContentById($content){
		foreach($content as $k => $v){
			$this->AddContentById($k, $v);
		}
	}
	
	public function AddContentByAdapter($id, $data, $map, $view, $isFile = true){
		$piece = $this->GetContent($view, $isFile);	
		$temp = '';
		
		foreach($data as $d){
			$p = $piece;
			foreach($map as $k => $v){
				$pattern = "/\{{ID:$v}}/";
				$p = preg_replace($pattern,$d[$k],$p);
			}
			$temp .= $p;
		}	
		
		$pattern = "/\{{ID:$id}}/";
		$this->content = preg_replace($pattern,$temp,$this->content);
		return true;
	}
	
	public function GetContent($view, $isFile = true){
		$content = '';	
 		if($isFile = true){
			$file = $this->path . $view . ".html";
			$exists = file_exists($file);
			if($exists){
				$content = file_get_contents($file);
			}else{
				return '';
			}
			
		}else{
			$content = $view;
		}
		
		$content = preg_replace_callback('/\{{ST:([a-zA-Z0-9_]*)}}/',array($this, 'StringTagReplacer'),$content);
 		return $content;
	}
	
	private function StringTagReplacer($matches){
		$string = '';
		if($this->strings->Get($matches[1]))
			$string = $this->strings->Get($matches[1]);
		return $string;
	}
}
