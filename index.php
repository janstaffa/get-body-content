    function file_get_body($path){
        $d = new DOMDocument;
        $mock = new DOMDocument;
        $d->loadHTML(mb_convert_encoding(file_get_contents($path), 'HTML-ENTITIES', "UTF-8"));
        if($body = $d->getElementsByTagName('body')->item(0)){
            foreach ($body->childNodes as $child){
                $mock->appendChild($mock->importNode($child, true));
            }   
            $response = $mock->saveHTML();
        }else{
            $response = $d->saveHTML();
        }
        return $response;          
    }
