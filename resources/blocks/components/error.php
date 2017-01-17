<?php
$error = $_SESSION["error"] ?? "";
if ($error): ?>
	<!-- Creating a div for the error message -->
<div class="errorContent">
    <?php echo $error; ?>
</div>
<?php
    unset($_SESSION["error"]);
    endif;
?>
