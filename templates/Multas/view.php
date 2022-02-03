<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Multa $multa
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Multa'), ['action' => 'edit', $multa->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Multa'), ['action' => 'delete', $multa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multa->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Multas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Multa'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="multas view content">
            <h3><?= h($multa->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('NombreEquipo') ?></th>
                    <td><?= h($multa->nombreEquipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= h($multa->usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prestamo') ?></th>
                    <td><?= $multa->has('prestamo') ? $this->Html->link($multa->prestamo->id, ['controller' => 'Prestamos', 'action' => 'view', $multa->prestamo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($multa->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Multa') ?></th>
                    <td><?= $this->Number->format($multa->multa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($multa->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($multa->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
