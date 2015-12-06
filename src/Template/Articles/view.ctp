<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articlestags'), ['controller' => 'Articlestags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articlestag'), ['controller' => 'Articlestags', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles view large-9 medium-8 columns content">
<p><?= $this->Html->link(__('Home'), ['action' => 'index']) ?> >> <?= $article->has('category') ? $this->Html->link($article->category->name, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></p>
	<p><?= $date = $article->modified ?></p>
    <h3><?= h($article->title) ?></h3>
    <!-- <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $article->has('category') ? $this->Html->link($article->category->name, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $article->has('user') ? $this->Html->link($article->user->username, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table> -->
    <div class="row">
        <!-- <h4><?= __('Body') ?></h4> -->
        <?= $this->Text->autoParagraph(h($article->body)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Articlestags') ?></h4>
        <?php if (!empty($article->articlestags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Article Id') ?></th>
                <th><?= __('Tag Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->articlestags as $articlestags): ?>
            <tr>
                <td><?= h($articlestags->id) ?></td>
                <td><?= h($articlestags->article_id) ?></td>
                <td><?= h($articlestags->tag_id) ?></td>
                <td><?= h($articlestags->created) ?></td>
                <td><?= h($articlestags->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Articlestags', 'action' => 'view', $articlestags->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articlestags', 'action' => 'edit', $articlestags->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articlestags', 'action' => 'delete', $articlestags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlestags->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($article->comments)): ?>
        <!-- <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Body') ?></th>
                <th><?= __('Article Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr> -->
            <?php foreach ($article->comments as $comments): ?>
			<?php if($comments->status==1): ?>
			<p><?= $comments->user_id ?> <?= h($comments->created) ?></p>
			<p><?= h($comments->body) ?></p>
            <!-- <tr>
                <td><?= h($comments->id) ?></td>
                <td><?= h($comments->body) ?></td>
                <td><?= h($comments->article_id) ?></td>
                <td><?= h($comments->status) ?></td>
                <td><?= h($comments->user_id) ?></td>
                <td><?= h($comments->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>

                </td>
            </tr> -->
			<?php endif; ?>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
	<h5>Add Comment</h5>
	<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
</div>
