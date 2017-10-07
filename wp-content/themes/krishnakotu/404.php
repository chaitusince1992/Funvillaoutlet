<!DOCTYPE html>
<html lang="en">
	<head>
		<title>404</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans|Lusitana:100,400,700">
		<style>
		*{
			margin: 0;
			padding: 0;
		}
		html,body{
			height: 100%;
			overflow: hidden;
            font-size: 16px;
		}
		section{
			height: 100%;
			width: 100%;
			background-color:#e63f53;
		background-image:url(<?php echo get_template_directory_uri(); ?>/inc/imgNew/404.png);
		background-repeat: no-repeat;
		background-size: 400px;
		font-family: "Droid Sans";
		background-position: center center;
		color:#fff;
		display: flex;
  align-items: center;
  justify-content: center;
		}
		.main-section{
		width: 400px;
		max-width: 100%;
		}
		h1.title {
		position: relative;
		}
		h1.title:before{
		content: "";
		position: absolute;
		bottom: -15px;
		width: 40px;
		height: 4px;
		background: #fff;
		left: 2px;
		}

		p{
		font-size:3rem;
		margin: 20px 0px;
		font-family: "Lusitana"
		}
		.button{
		background: #fff;
		color:#e63f53;
		text-decoration: none;
		border-radius: 25px;
		padding: 15px 20px;
		margin: 15px 0px;
		display: inline-block;
		}
        @media only screen and (max-width:543px) {
            .main-section {
                width: 80%;
            }
            p {
                font-size: 2rem;
            }
            section {
                background-size: 90%;
            }
        }
		</style>
	</head>
	<body>

		<section>
			<div class="main-section">
				<h1 class="title">ERROR 404</h1>
				<p>ooops, something went wrong</p>
				<a href="<?php echo get_site_url()?>" class="button">GO TO HOME</a>
			</div>
		</section>
	</body>
</html>
