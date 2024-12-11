<?php include_once("inc/header.php"); ?>
<div class="mobile">
<div class="container">
	<fieldset class="form-container visible" id="connexionM" >
        <h1>content de vous revoir.</h1>
		<form action="traitement.php" method="post" class="connexion">
			<span>Connectez-vous</span>
			<input type="email" placeholder="Email" name="email"required/>
			<input type="password" placeholder="Password" name="mdp" required/>
			<a href="#" id="startinscriptionM"> toujours pas inscrit?</a>
            <input type="hidden" name="action" value="connexion">			
            <button type="submit" class="submitP">connexion</button>
		</form>
    </fieldset>
     <!-- les fieldset de inscription -->
     <form action="traitement.php" method="post" class="frm-inscription">
                <fieldset class="notVisible form-container" id="inscription1M">
                    <h2>Commencez l'inscription</h2>
                    <h3>créez votre compte!</h3>
                        <input type="text" placeholder="nom complet" name="nom" required/>
                        <input type="email" placeholder="courriel" name="email" required/>
                        <input type="password" placeholder="votre mot de passe" name="mdp" required/>

                    <a href="#" class="startConnexionM"> déjà inscrit?</a>
                    <button id="next1M" class="submitP" type="button">continuer</button>
                </fieldset>
                
                <fieldset class="notVisible form-container" id="inscription2M"> 
                    <h2>Laissez nous apprendre a vous connaitre</h2> 
                    <input type="number" placeholder="numero de rue" name="numero_rue"required/>
                        <input type="text" placeholder="nom de rue" name="nom_rue"required/>
                        <input type="text" placeholder="ville" name="ville"required/>
                        <input type="text" placeholder="code postal" name="code_postal"required/>
                        <select name="province_ID" id="province_ID">
                            <option value="1">Quebec</option>
                            <option value="2">Ontario</option>
                            <option value="3">Alberta</option>
                            <option value="4">Nunavut</option>
                            <option value="5">Yukon</option>
                        </select>
                    <a href="#" class="startConnexionM"> déjà inscrit?</a>
                    <button id="next2M" class="submitP" type="submit">Terminer</button>
            <input type="hidden" name="action" value="connexion">  
                </fieldset>
        </form>
</div>
</div>
<div class="PC">
    <div class="BigContainer">
    <div class="leftContainer">
        <img src="ressources/login.avif" alt="login" class="image">
    </div>
    <div class="rightContainer">

        <fieldset class="visible form-container" id="connexion">
        <h2>content de vous revoir.</h2>
        <form action="traitement.php" method="post" class="connexion">
                <input type="email" placeholder="Email" name="email"  required/>
                <input type="password" placeholder="Password" name="mdp"  required/>
            <input type="hidden" name="action" value="connexion">           
            <button class="submitP" type="submit">connexion</button>
                <a href="#" id="startinscription"> toujours pas inscrit?</a>
            </form>
        </fieldset>

            <!-- les fieldset de inscription -->
            <form action="traitement.php" method="post" class="frm-inscription">
                <fieldset class="notVisible form-container" id="inscription1">
                    <h2>Commencez l'inscription</h2>
                    <h3>créez votre compte!</h3>
                        <input type="text" placeholder="nom complet" name="nom"required />
                        <input type="text" placeholder="courriel" name="email"required />
                        <input type="password" placeholder="votre mot de passe" name="mdp"required />

                    <a href="#" class="startConnexion"> déjà inscrit?</a>
                    <button id="next1" class="submitP" type="button">continuer</button>
                </fieldset>
                
                <fieldset class="notVisible form-container" id="inscription2"> 
                    <h2>Laissez nous apprendre a vous connaitre</h2> 
                    <input type="number" placeholder="numero de rue" name="numero_rue"required/>
                        <input type="text" placeholder="nom de rue" name="nom_rue" required/>
                        <input type="text" placeholder="ville" name="ville" id="ville"required/>
                        <input type="text" placeholder="code postal" name="code_postal"required/>
                        <select name="province_ID" id="province_ID" >
                            <option value="1">Quebec</option>
                            <option value="2">Ontario</option>
                            <option value="3">Alberta</option>
                            <option value="4">Nunavut</option>
                            <option value="5">Yukon</option>
                        </select>
                    <a href="#" class="startConnexion"> déjà inscrit?</a>
                    <button id="next2" class="submitP" type="submit">Terminer</button>
            <input type="hidden" name="action" value="inscription">  
        </form>
        </div>
    </div>
    </div>
</div>
<?php include_once("inc/footer.php"); ?>