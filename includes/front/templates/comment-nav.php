<nav class="comment-navigation" role="navigation">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="comment-link-nav-prev">
				<i class="fa fa-chevron-left" aria-hidden="true"></i>
				<?php previous_comments_link( esc_html__( 'Older Comments','cssecotheme' ) ); ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="post-link-nav-next">
				<?php next_comments_link( esc_html__( 'Newer Comments','cssecotheme' ) ); ?>
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</div>
		</div>
	</div>
</nav>