<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Multa $multa
 * @var \Cake\Collection\CollectionInterface|string[] $prestamos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Multas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="multas form content">
            <?= $this->Form->create($multa) ?>
            <fieldset>
                <legend><?= __('Add Multa') ?></legend>
                <?php
                    echo $this->Form->control('nombreEquipo');
                    echo $this->Form->control('usuario');
                    echo $this->Form->control('multa');
                    echo $this->Form->control('prestamo_id', ['options' => $prestamos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
