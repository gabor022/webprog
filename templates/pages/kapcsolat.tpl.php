<head>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<div id="content">
<h1>Kapcsolat</h1>
    <form name="kapcsolat" action="/logicals/kapcsolat2.php" onsubmit="return ellenoriz();" method="post">
        <div>
            <label><input type="text" id="nev" name="nev" size="20" maxlength="40">Név (minimum 5 karakter): </label>
            <br/>
            <label><input type="text" id="email" name="email" size="30" maxlength="40">E-mail (kötelező): </label>
            <br/>
            <label> <textarea id="szoveg" name="szoveg" cols="40" rows="10"></textarea> Üzenet (kötelező): </label>
            <br/>
            <input id="kuld" type="submit" value="Küld">
            <button onclick="ellenoriz();" type="button">Ellenőriz</button>
        </div>
    </form>
</div>