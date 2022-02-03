<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prestamo $prestamo
 * @var \Cake\Collection\CollectionInterface|string[] $equipos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Prestamos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="prestamos form content">
            <?= $this->Form->create($prestamo) ?>
            <fieldset>
                <legend><?= __('Add Prestamo') ?></legend>
                <?php
                    echo $this->Form->control('fechaInicio');
                    echo $this->Form->control('fechaFin');
                    echo $this->Form->control('fechaEntrega', ['required' => 'false']);
                    echo $this->Form->control('usuario');
                    echo $this->Form->control('estado');
                    echo $this->Form->control('equipo_id', ['options' => $equipos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
