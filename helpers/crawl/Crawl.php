<?php namespace app\helpers\crawl;

include_once("simple_html_dom.php");

class Crawl{
    
    var $html_content = '';
    var $arr_att_clean = array();
    
    function H_Crawl(){
        // nothing to do
    }
    
    function getTitle($link, $att_title){
        if($this->html_content==''){
            $html = file_get_html($link);
            $this->html_content = $html;  

        }else{
            $html = $this->html_content;
        }
                
        foreach($html->find($att_title) as $e){
            $title = $e->innertext;
        }
        return $title;
    }


    function getKeywords($remote_html){
        $kw = "";
        $html = file_get_html($remote_html); 
        foreach($html->find('meta') as $element)
        {
            if($element->name=='keywords'){ 
                $kw = $element->content;  
                if($kw){ return $kw; }
                else{ return $kw = null; }        
            }
        }
         
    }

    function getDescriptionmeta($remote_html){
        
        $html = file_get_html($remote_html); 
        foreach($html->find('meta') as $element)
        {
            if($element->name=='description'){ 
                $dsc = $element->content; 
                if($dsc){ return $dsc; }
                else{ return $dsc = null; }        
            }
        }
          
    }

    function getImagesFromMeta($remote_html){
        
        $html = file_get_html($remote_html); 
        foreach($html->find('meta') as $element)
        {
            if($element->property=='og:image'){ 
                $img = $element->content;  
                if(!$img){
                    return $img = null;
                }else{
                    return $img;
                }       
            } 
        }
        
        
          
    }


    function getTypes($remote_html){
        
        $html = file_get_html($remote_html); 
        foreach($html->find('a') as $element)
        {
            $arr[] = $element->innertext;
        }
        return $arr[5];  
    }

    
    
    function  getContent($link, $att_content){
        if($this->html_content==''){
            $html = file_get_html($link);
            $this->html_content = $html;    
        }else{
            $html = $this->html_content;
        }
                
        foreach($html->find($att_content) as $e){
            $content_html = $e->innertext;
        }
        $html = str_get_html($content_html);
       
        foreach($this->arr_att_clean as $att_clean){
            // google+
            foreach($html->find($att_clean) as $e){
                $e->outertext = '';
            }
        }
        
        $ret = $html->save();
        return $ret;
    }
    
    
    function removeLink($content){
        $html = str_get_html($content);
        // link content
        foreach($html->find('a') as $e){
            $e->outertext = $e->innertext;
        }
        $ret = $html->save();
        return $ret;
    }



    
    
    
    function removeLastElement($content, $element){
        $html = str_get_html($content);
        // link content
        $html->find($element, -1)->outertext = '';
        $ret = $html->save();
        return $ret;
    }
    
    
    function removeFirstElement($content, $element){
        $html = str_get_html($content);        
        $html->find($element, 0)->outertext = '';
        $ret = $html->save();
        return $ret;
    }

}