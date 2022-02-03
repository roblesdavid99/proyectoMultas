<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipo $equipo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Equipo'), ['action' => 'edit', $equipo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Equipo'), ['action' => 'delete', $equipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Equipos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Equipo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="equipos view content">
            <h3><?= h($equipo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($equipo->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($equipo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($equipo->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($equipo->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
