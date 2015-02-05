<div class="editingComment" id="editingComment-<?= $comment->id ?>">
	<?= $this->Flash->render() ?>
	<?php if (isset($comment)): ?>
		<?= $this->Form->create($comment, [
			'url' => ['action' => 'editComment']
		]) ?>
		<div class="form-group">
			<?= $this->Form->input(
				'content', [
					'label' => false,
					'class' => 'form-control commentBox',
					'id' => 'commentBox-' . $comment->id
				]
			) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->button(__('Update Comment'), ['type' => 'submit', 'class' => 'btn btn-sm btn-primary']); ?>
			<?= $this->Html->link(__('Cancel'), '#', ['data-id' => $comment->id, 'class' => 'btn btn-sm btn-danger', 'id' => 'cancelEditComment']); ?>
		</div>
		<?= $this->Form->end(); ?>
	<?php endif; ?>
	<script type="text/javascript">
	$(function() {
		$("#cancelEditComment").click(function () {
			var commentId = $(this).attr("data-id");
			$("#comment-" + commentId + " .content").fadeIn();
			$("#editingComment-" + commentId).remove();

			return false;
		});
	});
	</script>
</div>
