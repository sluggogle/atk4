<?
/**
 * This is the description for the Class
 *
 * @author		Romans <romans@adevel.com>
 * @copyright	See file COPYING
 * @version		$Id$
 */
class Menu extends CompleteLister {
    function defaultTemplate(){
        return array('shared','Menu');
    }
    function addMenuItem($label,$href=null){
        if(!$href){
            $href=ereg_replace('[^a-zA-Z0-9]','',$label);
            if($label[0]==';'){
                $label=substr($label,1);
                $href=';'.$href;
            }
        }
        $this->data[]=array('href'=>$this->api->getDestinationURL($href),'label'=>$label,'tdclass'=>
                ($href==$this->api->page||$href==';'.$this->api->page)?"current":"separator");

        return $this;
    }
    function init(){

        parent::init();
        $this->setStaticSource(array());
        $this->template->trySet($this->api->apinfo);
    }
}
