<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Flexbox</title>
	<style>
		@media(min-width:468px){
			.container-1 {
				display: flex;
				/*align-items: flex-start;*/
				/*align-items: flex-end;*/
				/*align-items: center;*/
				/*align-items: stretch; */
				/*flex-direction: column;*/
				flex-direction: row; /* Default */
			}
			.container-2 {
				display: flex;
				/*justify-content: space-between;
				justify-content: center;*/
				justify-content: space-around;
				/* justify-content: flex-start; default*/
			}
		}

		.container-3 {
			display: flex;
			flex-wrap: wrap;
		}
		
		.container-1 div, .container-2 div, .container-3 div {
			border: 1px #ccc solid;
			padding: 10px;
		}
		.box-1 {
			flex: 2;
			order: 1;
		}
		.box-2 {
			flex: 1;
			order: 3;
		}
		.box-3 {
			flex: 1;
			order: 1;
		}
		.container-2-box {
			flex-basis: 27%;
		}
		.container-3-box {
			flex-basis: 12%;
		}
	</style>
</head>
<body>
	<div class="container-1">
		<div class="box-1">
			<h3>Box One</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
		<div class="box-2">
			<h3>Box Two</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
		<div class="box-3">
			<h3>Box Three</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
	</div>
	
	<div class="container-2">
		<div class="container-2-box">
			<h3>Box Four</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
		<div class="container-2-box">
			<h3>Box Five</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
		<div class="container-2-box">
			<h3>Box Six</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
	</div>

	<div class="container-3">
		<div class="container-3-box">
			<h3>Box Seven</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
		<div class="container-3-box">
			<h3>Box Eight</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
		<div class="container-3-box">
			<h3>Box Nine</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
		<div class="container-3-box">
			<h3>Box Ten</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
		<div class="container-3-box">
			<h3>Box Eleven</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
		<div class="container-3-box">
			<h3>Box Twelve</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, earum?</p>
		</div>
	</div>

</body>
</html>























