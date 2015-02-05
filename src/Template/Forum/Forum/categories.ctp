<?php
use Cake\Utility\Inflector;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10">
			<ol class="breadcrumb">
				<li>
					<?= $this->Html->link(__("Home"), '/') ?>
				</li>
				<li>
					<?= $this->Html->link(__("Forum"), ['action' => 'index']) ?>
				</li>
				<?php foreach ($breadcrumbs as $breadcrumb): ?>
					<li>
						<?= $this->Html->link(
							$breadcrumb->title,
							[
								'_name' => 'forum-categories',
								'id' => $breadcrumb->id,
								'slug' => Inflector::slug($breadcrumb->title, '-')
							]
						) ?>
					</li>
				<?php endforeach; ?>
				<li class="active">
					<?= h($category->title) ?>
				</li>
			</ol>
			<?= $this->Flash->render('badge') ?>
			<?= $this->Flash->render() ?>
		</div>

		<div class="col-md-10">
			<main role="main" class="main">

				<?php if (!empty($category->child_forum_categories)): ?>
					<?= $this->element('forum\categories', [
						'category' => $category,
						'forums' => $categories
					]) ?>
				<?php endif; ?>

				<?php if (isset($threads) && !empty($threads->toArray())): ?>
					<div class="panel panel-forum">
						<div class="panel-heading">
							<div class="categoryTitle">
								<?= __('{0} Topics', '<i class="fa fa-users"></i>') ?>
							</div>
						</div>
						<div class="panel-inner">
							<table class="table tableCategories table-striped table-primary table-hover">
								<thead>
									<tr>
										<th class="categoryTitle">
											<?= __("Title") ?>
										</th>
										<th class="statisticsTitle hidden-xs">
											<?= __("Statistics") ?>
										</th>
										<th class="lastPostTitle">
											<?= __("Last post") ?>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($threads as $thread): ?>
										<tr>
											<td class="threadInfo">
												<span class="threadIcon">
													<?php if ($thread->sticky == true): ?>
														<i class="fa fa-thumb-tack fa-2x fa-rotate-45"></i>
													<?php else: ?>
														<i class="fa fa-comments-o fa-2x forumRead"></i>
													<?php endif; ?>

													<?php if ($thread->thread_open == false): ?>
														<i class="fa fa-lock forumClosed"></i>
													<?php endif; ?>
												</span>
												<div class="threadText">
													<div class="threadTitle">
														<?= $this->Html->link($thread->title, ['_name' => 'forum-threads', 'id' => $thread->id, 'slug' => Inflector::slug($thread->title, '-')]) ?>
													</div>
													<span class="threadDescription">
														<?= __('By') ?>
														<?= $this->Html->link($thread->user->full_name, ['_name' => 'users-profile', 'slug' => $thread->user->slug, 'prefix' => false], ['class' => 'text-primary']) ?>
														<small>
															- <?= ucwords($thread->created->i18nFormat([\IntlDateFormatter::FULL, \IntlDateFormatter::SHORT])) ?>
														</small>
													</span>
												</div>
											</td>
											<td class="threadStats hidden-xs">
												<span class="stats-wrapper">
													<?= __n('{0} Reply', '{0} Replies', $thread->reply_count, $thread->reply_count) ?><br />
													<?= __n('{0} View', '{0} Views', $thread->view_count, $thread->view_count) ?>
												</span>
											</td>
											<td class="threadLastPost hidden-xs">
												<span class="lastMessage">
													<?= __('By') ?>
													<?= $this->Html->link($thread->last_post_user->full_name, ['_name' => 'users-profile', 'slug' => $thread->last_post_user->slug, 'prefix' => false], ['class' => 'text-primary']) ?>
													<?= $this->Html->link(
														'<i class="fa fa-sign-out"></i>',
														[
															'_name' => 'forum-threads',
															'id' => $thread->id,
															'slug' => Inflector::slug($thread->title, '-')
														],
														[
															'escape' => false,
															'class' => 'text-primary'
														]
													)?>
													<br>
													<span class="lastMessagetime"><?= $thread->last_post->created->i18nFormat([\IntlDateFormatter::MEDIUM, \IntlDateFormatter::SHORT]) ?></span>
												</span>
											</td>
											<td class="threadLastPost-phone visible-xs">
												<i class="fa fa-plus fa-2x"></i>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>

						</div>
					</div>


					<div class="pagination-centered">
						<ul class="pagination">
							<?php if ($this->Paginator->hasPrev()): ?>
								<?= $this->Paginator->prev('«'); ?>
							<?php endif; ?>
							<?= $this->Paginator->numbers(['modulus' => 5]); ?>
							<?php if ($this->Paginator->hasNext()): ?>
								<?= $this->Paginator->next('»'); ?>
							<?php endif; ?>
						</ul>
					</div>
				<?php elseif ((!isset($thread) || empty($threads->toArray())) && $category->category_open == true): ?>
					<div class="infobox infobox-primary">
						<h4><?= __("No threads found"); ?></h4>
						<p>
							<?= __("No threads were found for this category. {0}", $this->Html->link(__('{0} Create a Thread', '<i class="fa fa-plus"></i>'), ['controller' => 'threads', 'action' => 'new'], ['class' => 'btn btn-sm btn-primary', 'escape' => false])); ?>
						</p>
					</div>
				<?php endif; ?>
			</main>
		</div>
	</div>
</div>
