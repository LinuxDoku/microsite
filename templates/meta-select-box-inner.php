<style type="text/css">
	#microsite-select select {
		width: 100%;
	}
</style>
<select name="microsite">
	<option>none</option>
	<?php foreach($microsites as $microsite): ?>
	<option <?php if($microsite == $selectedMicrosite) echo 'selected' ?>><?php echo $microsite ?></option>
	<?php endforeach; ?>
</select>