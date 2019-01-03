<div class="container">
    <h3 class="text-center">Editace skladby</h3>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <?php
            
                $atributy = array(
                    'class' => 'form-vertical' 
                );
                echo form_open('administrace/zpracovani-editace-skladby/'.$skladba[0]->id_skladby, $atributy);

                //Řádek Název skladby
                echo "<div class='form-group controls mb-0 pb-2'>";

                $atributy = array(
                    'class' => 'control-label col-sm-12'
                );     
                echo form_label("Název", "nazev", $atributy);

                echo"<div class='col-sm-12'>";

                $atributy = array(
                    'class' => 'form-control input-sm chat-input',
                    'id' => 'nazev',
                    'name' => 'nazev',
                    'value' => $skladba[0]->nazev,
                    'required' => true,
                );
                echo form_input($atributy);

                echo "</div></div>";
                
                //Řádek Čas
                echo "<div class='form-group controls mb-0 pb-2'>";

                $atributy = array(
                    'class' => 'control-label col-sm-12'
                );     
                echo form_label("Čas", "cas", $atributy);

                echo"<div class='col-sm-12'>";

                $atributy = array(
                    'class' => 'form-control input-sm chat-input',
                    'id' => 'cas',
                    'name' => 'cas',
                    'value' => $skladba[0]->cas,
                    'required' => true,
                );
                echo form_input($atributy);

                echo "</div></div>";
                
                //Řádek Id alba
                echo "<div class='form-group controls mb-0 pb-2'>";

                $atributy = array(
                    'class' => 'control-label col-sm-12'
                );     

                echo"<div class='col-sm-12'>";

                $atributy = array(
                    'class' => 'form-control input-sm chat-input',
                    'id' => 'id_alba',
                    'name' => 'id_alba',
                    'value' => $skladba[0]->album_id_alba,
                    'hidden' => true,
                );
                echo form_input($atributy);

                echo "</div></div>";
                
                //Tlačítko Odeslat
                echo "<div class='form-group text-center'>";

                $atributy = array(
                    'name' => 'Odeslat',
                    'type' => 'submit',
                    'content' => 'Editovat skladbu',
                    'class' => 'btn btn-primary btn-xl'
                );
                echo form_button($atributy);

                echo "<div class='form-group'>";
                echo "<div class='col-sm-offset-2 col-sm-8'>";
                echo "</div></div>";
                echo form_close();
                
            ?>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>