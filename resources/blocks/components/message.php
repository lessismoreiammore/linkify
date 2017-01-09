<?php if ($message): ?>
	<!-- Creating a div for the message to be able to style it -->
<div class="messageContent">
    <?php echo $message; ?>
</div>
<?php
    unset($_SESSION["message"]);
    endif;
?>
