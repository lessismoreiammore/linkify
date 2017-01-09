<?php if ($error): ?>
	<!-- Creating a div for the error message to be able to style it -->
<div class="errorContent">
    <?php echo $error; ?>
</div>
<?php
    unset($_SESSION["error"]);
    endif;
?>
