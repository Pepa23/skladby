<div class="container">

    <!-- Introduction Row -->
    <div class="row">
        <div class="col-lg-12">
			<p><span class="aktivni"><a href="<?php echo  base_url(); ?>">Hlavní stránka</a></span> <b class="dark">></b> <span class="aktivni"><a href="<?php echo  base_url('seznam-autoru'); ?>">Seznam autorů</a></span> <b class="dark">></b> <span class="neaktivni"><?php echo $autor[0]->jmeno; ?></a></span></p>
			<br>
        </div>
    </div>
    

	
	
	<div class="row">    
		<div class="col-lg-4 col-sm-6 text-center mb-4">
			<h1 class="page-header"><?php echo $autor[0]->jmeno; ?></h1>
            <img class="autor img-fluid d-block mx-auto" src="<?php echo base_url('assets/images/autori/'.$autor[0]->obrazek); ?>" alt="" width="200px" height="200px">
		</div>
		<div class="col-lg-8 col-sm-6 mb-8">
			<h1>Informace</h1>
			<p class="popis"><?php echo $autor[0]->popis; ?></p>
		</div>  
    </div>
	<div class="line"></div>
    
    <!-- Alba autora -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Alba autora</h1>			
        </div>
    </div>
    <div class="row">
        <?php foreach ($albaAutora as $row) { ?>
            <div class="col-lg-4 col-sm-6 text-center mb-4">
                <a href="<?php echo base_url('album/'.$row->id_alba); ?>"> 
                    <img class="album img-fluid d-block mx-auto" src="<?php echo base_url('assets/images/alba/'.$row->obrazek); ?>" alt="" width="200px" height="200px">
                </a>
                <h3 class="odsazeni-nadpis"><?php echo $row->nazev; ?></h3>
				<div class="line"></div>
            </div>
        <?php } ?>
    </div>
    
</div>