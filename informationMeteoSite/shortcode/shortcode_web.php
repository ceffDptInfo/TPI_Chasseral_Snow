<?php
if (!function_exists('shortcode_chasseralSnow_webcam')){
    function shortcode_chasseralSnow_webcam(){
        global $wpdb;
        $query=<<<SQL
            SELECT 
                   `url_web` 
            FROM 
                 `{$wpdb->prefix}bs_webcam` 
                    AS `w`
            LEFT JOIN 
                `{$wpdb->prefix}bs_bulletin` 
                    AS `b` 
                    ON 
                        `b`.`id_web` = `w`.`id_web`
            ORDER BY 
                     `b`.`id_bul` 
                     DESC LIMIT 1
SQL;

        $result_web = $wpdb->get_var($query);

        return "<div>
            <img src='$result_web'>
            
     </div>
        ";
    }
    add_shortcode('shortcode_chasseralSnow_web', 'shortcode_chasseralSnow_webcam');
}
