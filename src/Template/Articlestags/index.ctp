<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Articlestag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articlestags index large-9 medium-8 columns content">
    <h3><?= __('Articlestags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('article_id') ?></th>
                <th><?= $this->Paginator->sort('tag_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articlestags as $articlestag): ?>
            <tr>
                <td><?= $this->Number->format($articlestag->id) ?></td>
                <td><?= $articlestag->has('article') ? $this->Html->link($articlestag->article->title, ['controller' => 'Articles', 'action' => 'view', $articlestag->article->id]) : '' ?></td>
                <td><?= $articlestag->has('tag') ? $this->Html->link($articlestag->tag->id, ['controller' => 'Tags', 'action' => 'view', $articlestag->tag->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articlestag->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articlestag->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articlestag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlestag->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
