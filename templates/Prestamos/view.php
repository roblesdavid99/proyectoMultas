<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prestamo $prestamo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Prestamo'), ['action' => 'edit', $prestamo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Prestamo'), ['action' => 'delete', $prestamo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prestamo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Prestamos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Prestamo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="prestamos view content">
            <h3><?= h($prestamo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= h($prestamo->usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($prestamo->estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipo') ?></th>
                    <td><?= $prestamo->has('equipo') ? $this->Html->link($prestamo->equipo->id, ['controller' => 'Equipos', 'action' => 'view', $prestamo->equipo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($prestamo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('FechaInicio') ?></th>
                    <td><?= h($prestamo->fechaInicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('FechaFin') ?></th>
                    <td><?= h($prestamo->fechaFin) ?></td>
                </tr>
                <tr>
                    <th><?= __('FechaEntrega') ?></th>
                    <td><?= h($prestamo->fechaEntrega) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($prestamo->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($prestamo->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
