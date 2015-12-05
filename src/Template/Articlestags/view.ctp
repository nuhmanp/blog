<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articlestag'), ['action' => 'edit', $articlestag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articlestag'), ['action' => 'delete', $articlestag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlestag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articlestags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articlestag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articlestags view large-9 medium-8 columns content">
    <h3><?= h($articlestag->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Article') ?></th>
            <td><?= $articlestag->has('article') ? $this->Html->link($articlestag->article->title, ['controller' => 'Articles', 'action' => 'view', $articlestag->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tag') ?></th>
            <td><?= $articlestag->has('tag') ? $this->Html->link($articlestag->tag->id, ['controller' => 'Tags', 'action' => 'view', $articlestag->tag->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($articlestag->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($articlestag->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($articlestag->modified) ?></td>
        </tr>
    </table>
</div>
