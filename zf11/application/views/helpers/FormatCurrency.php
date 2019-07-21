<?php
class Places_View_Helper_FormatCurrency{
    public function formatCurrency($value, $symbol = 'грн.'){
        $output = $value;
        $value = trim($value);
        if(is_numeric($value)){
            $output = $value >= 0 ? number_format($value, 2) . " $symbol" : "-" . number_format($value, 2) . " $symbol";
            return $output;
        }
    }
}