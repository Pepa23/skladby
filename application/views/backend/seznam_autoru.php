<div class="container">
    <h1 class="text-center">Seznam autorů</h1>
    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>
    <div>
        <form action="<?php echo base_url('administrace/pridani-autora'); ?>" class="text-center">
            <button class="btn btn-primary btn-xl">Přidat autora</button>
        </form>
        <br>
    </div>
    
    <?php
        $pole = array(
            "Jméno",
            "Editace",
            "Smazat"
        );
        $this->table->set_heading($pole);

        foreach ($autori as $row) {
            $pole = array(
                $row->jmeno,
                '<a href="'.base_url('administrace/editace-autora/'.$row->id_autora).'"><i class="fa fa-edit fa-lg" alt="Editace"></i></a>',
                '<a href="'.base_url('administrace/smazani-autora/'.$row->id_autora).'"><i class="fa fa-trash fa-lg" alt="Smazat"></i></a>',
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