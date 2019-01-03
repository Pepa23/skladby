<div class="container">

    <!-- Introduction Row -->
    <div class="row">
        <div class="col-lg-12">
			<p><span class="aktivni"><a href="<?php echo  base_url(); ?>">Hlavní stránka</a></span> <b class="dark">></b> <span class="neaktivni">Seznam autorů</a></span></p>
			<br>
            <h1 class="page-header">Databáze hudby</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, explicabo dolores ipsam aliquam inventore corrupti eveniet quisquam quod totam laudantium repudiandae obcaecati ea consectetur debitis velit facere nisi expedita vel?</p>
        </div>
    </div>

    <!-- Seznam autorů-->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Seznam autorů</h2>
        </div>
    </div>
    <div class="row">
        <?php foreach ($autori as $row) { ?>
            <div class="col-lg-4 col-sm-6 text-center mb-4">
                <a href="<?php echo base_url('autor/'.$row->id_autora); ?>"> 
                    <img class="rounded-circle img-fluid d-block mx-auto" src="<?php echo base_url('assets/images/autori/'.$row->obrazek); ?>" alt="" width="200px" height="200px">
                </a>
                <h3 class="odsazeni-nadpis"><?php echo $row->jmeno; ?></h3>
				<div class="line"></div>
            </div>
        <?php } ?>
    </div>
</div>