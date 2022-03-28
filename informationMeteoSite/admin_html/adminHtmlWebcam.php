<?php
$path = plugin_dir_url(dirname(__FILE__));

global $wpdb;
$queryWebcam = <<<SQL
SELECT `id_web`, `url_web`, `nom_web`, `act_web`, `def_web` FROM `{$wpdb->prefix}bs_webcam`;       
SQL;

$result_web = $wpdb->get_results($queryWebcam);

?>
<!-- Modal -->
<div class="modal fade" id="gestionWebcamModal" tabindex="-1" role="dialog" aria-labelledby="gestionWebcamModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gestionWebcamModalLabel">Gestion des webcam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!--    Nom, URL, Défaut, active de chaque webcam        -->
                <?php
                foreach ($result_web as $val) {
                    ?>
                    <div id="webcamId" class="row geWebCamClass" >
                        <div class="col-3">
                            <label id="<?= $val->id_web ?>nom"><?= $val->nom_web ?></label>
                        </div>
                        <div class="col-7">
                            <label id="<?= $val->id_web ?>url"><?= $val->url_web ?></label>
                        </div>
                        <div class="col-1">
                            <?php if ($val->def_web == 1) {?>
                                <div class="form-check radioWebClass">
                                    <input class="form-check-input" type="radio" name="RadioAct" id="<?= $val->id_web ?>" checked>
                                </div>
                            <?php }else{ ?>
                                <div class="form-check radioWebClass">
                                    <input class="form-check-input" type="radio" name="RadioAct" id="<?= $val->id_web ?>">
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-1">
                            <?php if ($val->act_web == 1) {?>
                                <div class="form-check checkBoxWebClass">
                                    <input class="form-check-input" type="checkbox" value="" id="<?= $val->id_web ?>" checked>
                                </div>
                            <?php }else{ ?>
                                <div class="form-check checkBoxWebClass">
                                    <input class="form-check-input" type="checkbox" value="" id="<?= $val->id_web ?>">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>