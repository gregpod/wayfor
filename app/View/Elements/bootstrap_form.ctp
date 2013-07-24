<?php echo $this->Form->create('Sample', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend>Extending form controls</legend>
        <?php echo $this->Form->input('field1', array(
            'label' => 'Prepended text',
            'type' => 'text',
            'class' => 'span2',
            'prepend' => '@',
            'helpBlock' => 'Here\'s some help text',
        )); ?>
        <?php echo $this->Form->input('field2', array(
            'label' => 'Appended text',
            'type' => 'text',
            'class' => 'span2',
            'append' => '.00',
            'helpInline' => 'Here\'s more help text',
        )); ?>
        <?php echo $this->Form->input('field3', array(
            'label' => 'Append and prepend',
            'type' => 'text',
            'class' => 'span2',
            'prepend' => '$',
            'append' => '.00',
        )); ?>
        <?php echo $this->Form->input('field4', array(
            'label' => 'Append with button',
            'type' => 'text',
            'class' => 'span2',
            'append' => array('Go!', array('wrap' => 'button', 'class' => 'btn')),
        )); ?>
        <?php echo $this->Form->input('field5', array(
            'label' => 'Inline checkboxes',
            'type' => 'select',
            'multiple' => 'checkbox inline',
            'options' => array('1', '2', '3'),
        )); ?>
        <?php echo $this->Form->input('field6', array(
            'label' => 'Checkboxes',
            'type' => 'select',
            'multiple' => 'checkbox',
            'options' => array(
                '1' => 'Option one is this and that¡ªbe sure to include why it\'s great',
                '2' => 'Option two can also be checked and included in form results',
                '3' => 'Option three can¡ªyes, you guessed it¡ªalso be checked and included in form results',
            ),
            'helpBlock' => '<strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.',
        )); ?>
        <?php echo $this->Form->input('field7', array(
            'label' => 'Radio buttons',
            'type' => 'radio',
            'options' => array(
                '1' => 'Option one is this and that¡ªbe sure to include why it\'s great',
                '2' => 'Option two can is something else and selecting it will deselect option one',
            ),
        )); ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Save changes', array(
                'div' => false,
                'class' => 'btn btn-primary',
            )); ?>
            <button class="btn">Cancel</button>
        </div>
    </fieldset>
<?php echo $this->Form->end(); ?>