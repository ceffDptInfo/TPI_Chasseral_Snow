<?php
if (!function_exists('shortcode_chasseralSnow_general')) {
    function shortcode_chasseralSnow_general()
    {
        global $wpdb;
        $query = <<<SQL
            SELECT 
                `b`.`heure_bul`, `b`.`date_bul`, `b`.`temperature_bul`, `b`.`id_met`, `p`.`etat_pst`, `n`.`etat_nge`, `w`.`url_web`, `b`.`texte_bul`
            FROM 
                `{$wpdb->prefix}bs_bulletin` AS `b`
            LEFT JOIN 
                    `{$wpdb->prefix}bs_meteo` AS `m` 
                        ON `b`.`id_met` = `m`.`id_met`
            LEFT JOIN 
                    `{$wpdb->prefix}bs_pistes` AS `p` 
                        ON `b`.`id_pst` = `p`.`id_pst`
            LEFT JOIN 
                    `{$wpdb->prefix}bs_neige` AS `n` 
                        ON `b`.`id_nge` = `n`.`id_nge`
            LEFT JOIN 
                    `{$wpdb->prefix}bs_webcam` AS `w` 
                        ON `b`.`id_web` = `w`.`id_web`
            ORDER BY 
                     `b`.`id_bul` 
                        DESC LIMIT 1
SQL;

        $query1 = <<< SQL
            SELECT
                `i`.`id_ins`
                , `i`.`nom_ins`
                , IF(`ia`.`date_ins` IS NULL, FALSE, TRUE) AS `isActive`
            FROM `{$wpdb->prefix}bs_installations` AS `i`
            LEFT JOIN (
                SELECT 
                    `id_ins`
                    , IF(
                        max(`date_ins`) = CURRENT_DATE(),
                        CURRENT_DATE(),
                        NULL
                    ) AS `date_ins`
                FROM `{$wpdb->prefix}bs_installations_active`
                GROUP BY `id_ins`
            ) AS `ia`
            ON `i`.`id_ins` = `ia`.`id_ins`;
SQL;
        $result = $wpdb->get_results($query);
        $result1 = $wpdb->get_results($query1);

        $path = plugin_dir_url(dirname(__FILE__));

        ob_start();

        foreach ($result as $val) { ?>
            <div class="content">
                <div class="img_urlWeb">
                    <img id="imgId" src="<?= $val->url_web ?>">
                </div>
                <div class="topRight">
                    <div class="la_heureBul">
                        <label><?= "Météo à " . date('H:i', strtotime($val->heure_bul)); ?></label>
                    </div>
                    <div class="imgTem">
                        <div class="img_idMet">
                            <img src="<?= $path ?>imageMeteo/<?= $val->id_met ?>.png">
                        </div>

                        <div class="la_temperatureBul">
                            <label> <?= $val->temperature_bul ?>° </label>
                        </div>
                    </div>
                    <div class="la_dateBul">
                        <label><?= strftime('%A %d %B ', strtotime($val->date_bul)) ?></label>
                    </div>
                    <div class="la_etatPst">
                        <label> État des pistes : <?= $val->etat_pst ?> </label>
                    </div>
                    <div class="la_etatNge">
                        <label for='heure'> Enneigement : <?= $val->etat_nge ?> </label>
                    </div>
                </div>
                <div class="bottomRight">
                    <div class="insTelski">
                        <div class="inst">
                            <label> Installations : </label>
                        </div>
                        <div class="img_imageSkie">
                            <img class="imageSkie" src="<?= $path ?>/imageIsActive/tsb.png">
                        </div>
                    </div>
                    <div class="installation">
                        <table class="tableInstal" cellspacing="0">
                            <?php foreach (array_chunk($result1, 2) as $val) { ?>
                                <div class="statusInstallation">
                                    <tr>
                                        <?php foreach ($val as $v) { ?>
                                            <td>
                                                <?php
                                                if ($v->isActive == 1) {
                                                    ?>
                                                    <img class="isActiveImg" src="<?= $path ?>/imageIsActive/green.png">
                                                    <?php
                                                } else { ?>
                                                    <img class="isActiveImg" src="<?= $path ?>/imageIsActive/red.png">
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>
                                                <div class="nomInstallation">
                                                    <label><?= $v->nom_ins ?></label>
                                                </div>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                </div>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <?php

        }
        $output = ob_get_clean();
        return $output;
    }

    add_shortcode('shortcode_chasseralSnow_ge', 'shortcode_chasseralSnow_general');
}


