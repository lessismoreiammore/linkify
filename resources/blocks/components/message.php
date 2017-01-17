<?php
$message = $_SESSION["message"] ?? "";
if ($message): ?>
	<!-- Creating a div for the message  -->
<div class="messageContent">
    <?php echo $message; ?>
</div>
<?php
    unset($_SESSION["message"]);
    endif;
?>
