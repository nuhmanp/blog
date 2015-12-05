<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articlestags'), ['controller' => 'Articlestags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articlestag'), ['controller' => 'Articlestags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tag') ?></th>
            <td><?= h($tag->tag) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tag->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($tag->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($tag->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Articlestags') ?></h4>
        <?php if (!empty($tag->articlestags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Article Id') ?></th>
                <th><?= __('Tag Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->articlestags as $articlestags): ?>
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
</div>
