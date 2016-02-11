<?php
namespace Stacmv\El_test;

class EvalCalculator implements CalculatorInterface
{
    
    public function calculate($expression){
        
        $res = $error = "";
        
        if (preg_match("|^(\-?\(?\d+(\.\d+)?)([+\-*/]\(?\-?\d+(\.\d+)?\)?)*|", $expression)){
            
            try {
                eval("\$res = $expression;");
            }catch(\Exception $e){
                $res = "";
                if ($e->getMessage() == "Division by zero"){
                    $error = "Деление на ноль в данной версии не поддерживается!";
                }else{
                    $error = "Не удалось вычислить выражения.";
                }
                
            }                
            

        }else{
            
            $error = "Недопустимое выражение: &quot;" . htmlspecialchars($expression) . "&quot;";  //  кодируем кавычку ", т.к. строка будет json_encode.
            
        }
                        
        return new Result($expression, $res, $error);
        
    }
    
    
    
}