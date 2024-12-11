<?php include_once("inc/header.php"); ?>
<div class="mobile">
<div class="container">
	<div class="form-container">
        <h1>content de vous revoir.</h1>
		<form action="traitement.php" method="post" class="connexion">
			<span>Connextez-vous</span>
			<input type="email" placeholder="Email" name="email" id="email"/>
			<input type="password" placeholder="Password" name="mdp" id="mdp" />
			<a href="inscription.php"> toujours pas inscrit?</a>
            <input type="hidden" name="action" value="connexion">			
            <button type="submit">connexion</button>
		</form>
	</div>
</div>
</div>
<div class="PC">
    <div class="BigContainer">
    <div class="leftContainer">
        <img src="ressources/login.avif" alt="login" class="image">
    </div>
    <div class="rightContainer">
        <div class="form-container">
        <h2>content de vous revoir.</h2>
        <form action="traitement.php" method="post" class="connexion">
            <input type="email" placeholder="Email" name="email" id="email"/>
            <input type="password" placeholder="Password" name="mdp" id="mdp"/>
            <input type="hidden" name="action" value="connexion">           
            <button class="submitP" type="submit">connexion</button>
            <a href="inscription.php"> toujours pas inscrit?</a>
        </form>
        </div>
    </div>
    </div>
</div>
<?php include_once("inc/footer.php"); ?>