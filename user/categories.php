<style>
	.card-img-top{
		width: 50%;
		height: 50%;
		border-radius: 50%;
		margin: 0 auto;
		transform: scale(1.1);
		object-fit: cover;
		opacity: 0.5;
	}
	.card-img-top:hover{
		transition: all .3s ease-in-out; 
		transform: scale(1.3);
        opacity: 1;
	}
	.card{
		width: 12rem;
		padding: 0;
		border: none;
        margin: 0;
	}
    .active_border{
        border-bottom: 5px solid black;
    }
    .active_opacity{
        transform: scale(1.2);
        opacity: 1;
    }
	.row{
		justify-content: center;
	}
    .card-title{
        text-align: center;
    }
    a{
        text-decoration: none; /* Remove underlines */
    margin: 0; /* Reset margins */
    padding: 0; /* Reset paddings */
    color: black;
    }
</style>

<body>
	<div class="container-fluid mt-4">
		<div class="row">

				<div class="card">
                    <!-- <a href="#" class="text-center"> -->
					    <img class="card-img-top <?php if($cat1 == true){?> active_opacity <?php } ?>" src="../product/Milktea_Series.jpg">
					<div class="card-body">
						<h5 class="card-title <?php if($cat1 == true){?> active_border <?php } ?>">Milktea Series</h5>
					</div>
                    <!-- </a> -->
				</div>
			
			
				<div class="card">
                    <!-- <a href="#" class="text-center"> -->
					    <img class="card-img-top <?php if($cat2 == true){?> active_opacity <?php } ?>" src="../product/Oreo_Series.jpg">
					<div class="card-body">
						<h5 class="card-title <?php if($cat2 == true){?> active_border <?php } ?>">Oreo Series</h5>
					</div>
                    <!-- </a> -->
				</div>
			
			
				<div class="card">
                    <!-- <a href="#" class="text-center"> -->
					    <img class="card-img-top <?php if($cat3 == true){?> active_opacity <?php } ?>" src="../product/Nutella_Series.jpg">
					<div class="card-body">
						<h5 class="card-title <?php if($cat3 == true){?> active_border <?php } ?>">Nutella Series</h5>
					</div>
                    <!-- </a> -->
				</div>
			
			
				<div class="card">
                    <!-- <a href="#" class="text-center"> -->
					    <img class="card-img-top <?php if($cat4 == true){?> active_opacity <?php } ?>" onclick="window.location.href = '../user/NutellaOreo_series.php'" src="../product/NutellaOreo_Series.png">
					<div class="card-body">
						<h5 class="card-title <?php if($cat4 == true){?> active_border <?php } ?>">Nutella Oreo Series</h5>
					</div>
                    <!-- </a> -->
				</div>
			
				<div class="card">
					    <img class="card-img-top <?php if($cat5 == true){?> active_opacity <?php } ?>" onclick="window.location.href = '../user/Fruittea_series.php'" src="../product/FruitTea_Series.jpg">
					<div class="card-body">
						<h5 class="card-title <?php if($cat5 == true){?> active_border <?php } ?>">Fruit Tea / Yakult</h5>
					</div>
				</div>
			
				<div class="card">
                    <!-- <a href="#" class="text-center"> -->
					    <img class="card-img-top <?php if($cat6 == true){?> active_opacity <?php } ?>" src="../product/Refresher_series.jpg">
					<div class="card-body">
						<h5 class="card-title <?php if($cat6 == true){?> active_border <?php } ?>">Refresher</h5>
					</div>
                    <!-- </a> -->
				</div>
			
				<div class="card">
                    <!-- <a href="#" class="text-center"> -->
					    <img class="card-img-top <?php if($cat7 == true){?> active_opacity <?php } ?>" src="../product/Mactea_Special.jpg">
                    <div class="card-body">
						<h5 class="card-title <?php if($cat7 == true){?> active_border <?php } ?>">Mactea Special</h5>
					</div>
                    <!-- </a>     -->
				</div>
                
                
				<div class="card">
					    <img class="card-img-top <?php if($cat8 == true){?> active_opacity <?php } ?>" onclick="window.location.href = '../user/MacCoffee_series.php'" src="../product/MacCoffee.jpg">
                    <div class="card-body">
						<h5 class="card-title <?php if($cat8 == true){?> active_border <?php } ?>">Mac Coffee</h5>
					</div>
				</div>
			
		</div>
	</div>
</body>