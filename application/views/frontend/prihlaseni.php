<div class="container">
    <h3 class="text-center">Přihlášení do administrace</h3>
    <?php echo $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <?php
                $atributy = array(
                    'class' => 'form-vertical' 
                );
                echo form_open('zpracovani-prihlaseni', $atributy);

                //Řádek Jméno
                echo "<div class='form-group controls mb-0 pb-2'>";

                $atributy = array(
                    'class' => 'control-label col-sm-12'
                );     
                echo form_label("Jméno", "jmeno", $atributy);

                echo"<div class='col-sm-12'>";

                $atributy = array(
                    'class' => 'form-control input-sm chat-input',
                    'id' => 'username',
                    'name' => 'username',
                    'type' => 'text',
                    'required' => true,
                );
                echo form_input($atributy);

                echo "</div></div>";
                
                //Řádek Heslo
                echo "<div class='form-group controls mb-0 pb-2'>";

                $atributy = array(
                    'class' => 'control-label col-sm-12'
                );     
                echo form_label("Heslo", "heslo", $atributy);

                echo"<div class='col-sm-12'>";

                $atributy = array(
                    'class' => 'form-control input-sm chat-input',
                    'id' => 'userPassword',
                    'name' => 'password',
                    'type' => 'password',
                    'required' => true,
                );
                echo form_input($atributy);

                echo "</div></div>";
                
                //Tlačítko Odeslat
                echo "<div class='form-group text-center'>";

                $atributy = array(
                    'name' => 'Odeslat',
                    'type' => 'submit',
                    'content' => 'Přihlásit',
                    'class' => 'btn btn-primary btn-xl'
                );
                echo form_button($atributy);

                echo "<div class='form-group'>";
                echo "<div class='col-sm-offset-2 col-sm-8'>";
                echo "</div></div>";
                echo form_close();
            ?>
        </div>
    </div>
</div>