<?php $btn = uniqid('btn-'); ?>
<style>
	#<?php echo $btn ?> {
		border-radius: 25px;
	}

	#<?php echo $btn ?>:hover {
		color: #fff;
	}
</style>
<div class="logout">
	<a id="<?= $btn ?>" href="<?php echo wp_logout_url("/welcome-to-member-area/"); ?>" class="btn btn--pill btn--primary btn--xl font-400">
		<span>Logout</span>
	</a>
</div>
