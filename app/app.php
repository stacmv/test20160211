<?php

$app = new \Slim\Slim(array(
    "templates.path" => TEMPLATES_DIR,
));

$app->get("/", function() use ($app, $CFG){
    $app->render("index.htm", array("CFG"=>$CFG));
});

$app->post("/", function() use ($app, $CFG) {
        
    $expr = $app->request->post("expr");
    $jsonp_callback = (string) $app->request->get("callback");
    
    $data = array();
    
    if ($expr){
        $calc = new \Stacmv\El_test\EvalCalculator();
        $data = $calc->calculate($expr);
        
    }else{
        $data["error"] = "Введите арифметическое выражение.";
    };
    
    
    
    if ($app->request->isAjax()){
        $json = json_encode($data);
        if ($jsonp_callback){
            $jsonp = $jsonp_callback . "('" . $json . "')";
            
            $app->response->headers->set('Content-Type', 'text/plain');
            $app->response->setBody($jsonp);
        }else{
            $app->response->headers->set('Content-Type', 'application/json');
            $app->response->setBody($json);
        };
        
    }else{
        $app->render("index.htm", array("CFG"=>$CFG, "view_data" => $data));
    }
    
});

$app->run();
