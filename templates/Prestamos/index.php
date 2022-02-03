<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prestamo[]|\Cake\Collection\CollectionInterface $prestamos
 */
?>
<div class="prestamos index content">
    <?= $this->Html->link(__('New Prestamo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Prestamos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fechaInicio') ?></th>
                    <th><?= $this->Paginator->sort('fechaFin') ?></th>
                    <th><?= $this->Paginator->sort('fechaEntrega') ?></th>
                    <th><?= $this->Paginator->sort('usuario') ?></th>
                    <th><?= $this->Paginator->sort('estado') ?></th>
                    <th><?= $this->Paginator->sort('equipo_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prestamos as $prestamo): ?>
                <tr>
                    <td><?= $this->Number->format($prestamo->id) ?></td>
                    <td><?= h($prestamo->fechaInicio) ?></td>
                    <td><?= h($prestamo->fechaFin) ?></td>
                    <td><?= h($prestamo->fechaEntrega) ?></td>
                    <td><?= h($prestamo->usuario) ?></td>
                    <td><?= h($prestamo->estado) ?></td>
                    <td><?= $prestamo->has('equipo') ? $this->Html->link($prestamo->equipo->id, ['controller' => 'Equipos', 'action' => 'view', $prestamo->equipo->id]) : '' ?></td>
                    <td><?= h($prestamo->created) ?></td>
                    <td><?= h($prestamo->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $prestamo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prestamo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prestamo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prestamo->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
