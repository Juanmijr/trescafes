<form>
    
<div class="elem-group">
    <img src="ejemploCaptcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i>
    <br><br>
    <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}">
</div>
    </form>
<script>
var refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function() {
  document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
}
</script>