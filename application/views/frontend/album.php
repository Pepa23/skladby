<div class="container">

    <!-- Introduction Row -->
    <div class="row">
        <div class="col-lg-12">
			<p><span class="aktivni"><a href="<?php echo  base_url(); ?>">Hlavní stránka</a></span> <b class="dark">></b> <span class="aktivni"><a href="<?php echo  base_url('seznam-autoru'); ?>">Seznam autorů</a></span> <b class="dark">></b> <span class="aktivni"><a href="<?php echo  base_url('autor/'.$album[0]->autor_id_autora); ?>"><?php echo $album[0]->jmeno_autora; ?></a></span> <b class="dark">></b> <span class="neaktivni"><?php echo $album[0]->nazev; ?></span></p>
			<br>
            <h1 class="page-header">Databáze hudby</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, explicabo dolores ipsam aliquam inventore corrupti eveniet quisquam quod totam laudantium repudiandae obcaecati ea consectetur debitis velit facere nisi expedita vel?</p>
        </div>
    </div>
    
    <!-- Album -->
    <div class="row text-center">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $album[0]->nazev; ?></h1>
            <img class="album-ctverec img-fluid d-block mx-auto" src="<?php echo base_url('assets/images/alba/'.$album[0]->obrazek); ?>" alt="" width="200px" height="200px">
            <h3>
                <a href="<?php echo  base_url('autor/'.$album[0]->autor_id_autora); ?>"><?php echo $album[0]->jmeno_autora; ?></a></h3>
        </div>
		<div class="line"></div>
	</div>
    
    <!-- Skladby alba -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Skladby alba</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
                $pole = array(
                    "Skladba",
                    "Čas"
                );
                $this->table->set_heading($pole);

                foreach($skladbyAlba as $row){
                    $pole = array(
                        $row->nazev,
                        $row->cas,
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