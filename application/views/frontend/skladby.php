<div class="container">

    <!-- Úvod stránky -->
    <div class="row">
        <div class="col-lg-12">
			<p><span class="aktivni"><a href="<?php echo  base_url(); ?>">Hlavní stránka</a></span> <b class="dark">></b> <span class="neaktivni">Seznam skladeb</a></span></p>
			<br>
            <h1 class="page-header">Databáze hudby</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, explicabo dolores ipsam aliquam inventore corrupti eveniet quisquam quod totam laudantium repudiandae obcaecati ea consectetur debitis velit facere nisi expedita vel?</p>
        </div>
    </div>

    <!-- Seznam skladeb -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Seznam skladeb</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
                $pole = array(
                    "Skladba",
                    "Autor",
                    "Album"
                );
                $this->table->set_heading($pole);

                foreach($skladby as $row){
                    $pole = array(
                        $row->nazev,
                        '<a href='.base_url('autor/'.$row->autor_id_autora).'>'.$row->jmeno_autora.'</a>',
                        '<a href='.base_url('album/'.$row->album_id_alba).'>'.$row->nazev_alba.'</a>',
                    );
                    $this->table->add_row($pole);
                };

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
    </div>
</div>