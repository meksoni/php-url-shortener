<?php
	include 'db_connect.php';

	$db = new Database("localhost", "url_shortener", "root", ""); // add password from db if you have
	$db = $db->connect();

	$stmt = $db->query("SELECT * FROM urls");
	$urls = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP URL Shortener</title>

	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<header>
		<h1>URL Shortener</h1>
	</header>
	<main>
		<section class="form">
			<form action="add/index.php" method="post">
				<input type="text" name="long_url" id="long_url" placeholder="e.g. https://example.com" />
				<input type="submit" value="SHORTEN" />
			</form>
		</section>

		<section class="urls">
			<?php foreach ($urls as $url) : ?>
			<div class="url">
				<div class="id">
					<?= $url['id']; ?>
				</div>
				<div class="short_url">
					<a href="<?= $url['long_url'] ?>" target="_blank">
						https://<?= $app_url ?>/r?c=<?= $url['id']; ?>
					</a>
				</div>
				<div class="long_url">
					<a target="_blank"><?= $url['long_url']; ?></a>
				</div>
			</div>
			<?php endforeach; ?>
		</section>
	</main>

    <footer>
        <div class="social-icons">
            <a href="https://github.com/meksoni" target="_blank" rel="noopener noreferrer">
                <img src="img/github.svg" alt="">
            </a>
            <a href="https://www.upwork.com/freelancers/~013ecb557a67d69280" target="_blank" rel="noopener noreferrer">
                <img src="img/upwork.png" alt="" />
            </a>
        </div>
    </footer>
</body>
</html>