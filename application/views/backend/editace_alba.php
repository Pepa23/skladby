<div class="container">
    <h3 class="text-center">Editace alba</h3>
    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <?php
                $atributy = array(
                    'class' => 'form-vertical' 
                );
                echo form_open('administrace/zpracovani-editace-alba/'.$album[0]->id_alba, $atributy);

                //Řádek Název alba
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
                    'value' => $album[0]->nazev,
                    'required' => true,
                );
                echo form_input($atributy);

                echo "</div></div>";
                
                //Řádek Obrázek
                echo "<div class='form-group controls mb-0 pb-2'>";

                $atributy = array(
                    'class' => 'control-label col-sm-12'
                );     
                echo form_label("Obrázek", "obrazek", $atributy);

                echo"<div class='col-sm-12'>";

                $atributy = array(
                    'class' => 'form-control input-sm chat-input',
                    'id' => 'obrazek',
                    'name' => 'obrazek',
                    'value' => $album[0]->obrazek,
                    'required' => true,
                );
                echo form_input($atributy);

                echo "</div></div>";
                
                //Řádek Id autora
                echo "<div class='form-group controls mb-0 pb-2'>";

                $atributy = array(
                    'class' => 'control-label col-sm-12'
                );     

                echo"<div class='col-sm-12'>";

                $atributy = array(
                    'class' => 'form-control input-sm chat-input',
                    'id' => 'id_autora',
                    'name' => 'id_autora',
                    'value' => $album[0]->autor_id_autora,
                    'hidden' => true,
                );
                echo form_input($atributy);

                echo "</div></div>";
                
                //Tlačítko Odeslat
                echo "<div class='form-group text-center'>";

                $atributy = array(
                    'name' => 'Odeslat',
                    'type' => 'submit',
                    'content' => 'Editovat album',
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
    
<div class="container">
    <h2 class="text-center">Seznam skladeb</h2>
    <div>
        <form action="<?php echo base_url('administrace/pridani-skladby/'.$album[0]->id_alba); ?>" class="text-center">
            <button class="btn btn-primary btn-xl">Přidat skladbu</button>
        </form>
        <br>
    </div>
    <?php
        $pole = array(
            "Skladba",
            "Editace",
            //"Smazat"
            "Viditelné",
            "Aktivace/Deaktivace"
        );
        $this->table->set_heading($pole);
            
        foreach($skladbyAlba as $row){
            $idSkladby = $row->id_skladby;
            
            if($row->aktivni == 0){
                $viditelne = 'Ano';
                $zmenaStavu = '<button type="button" class="btn btn-danger"><a href="'.base_url('administrace/deaktivace-skladby/'.$idSkladby).'">Deaktivovat</a></button>';
            } else {
                $viditelne = 'Ne';
                $zmenaStavu = '<button type="button" class="btn btn-success"><a href="'.base_url('administrace/aktivace-skladby/'.$idSkladby).'">Aktivovat</a></button>';
            }
            
            $pole = array(
                $row->nazev,
                '<a href="'.base_url('administrace/editace-skladby/'.$row->id_skladby).'"><i class="fa fa-edit fa-lg" alt="Editace"></i></a>',
                //'<a href="'.base_url('administrace/smazani-skladby/'.$row->id_skladby).'"><i class="fa fa-trash fa-lg" alt="Smazat"></i></a>',
                $viditelne,
                $zmenaStavu
            );
            $this->table->add_row($pole);
        }

        $template = array(
            'table_open'            => '<table class="table table-bordered">',

            'thead_open'            => '<thead>',
            'thead_close'           => '</thead>',

            'heading_row_start'     => '<tr>',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th>',
            'heading_cell_end'      => '</th>',

            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',

            'row_start'             => '<tr>',
            'row_end'               => '</tr>',
            'cell_start'            => '<td>',
            'cell_end'              => '</td>',

            'row_alt_start'         => '<tr>',
            'row_alt_end'           => '</tr>',
            'cell_alt_start'        => '<td>',
            'cell_alt_end'          => '</td>',

            'table_close'           => '</table>'
        );

        $this->table->set_template($template);
        echo $this->table->generate();
    ?>
</div>