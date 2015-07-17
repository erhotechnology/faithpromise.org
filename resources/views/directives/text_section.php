<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = array_merge(
        [
            'title' => '',
            'class' => '',
            'buttons' => []
        ], $directive["args"]
    );
    $args['class'] = trim('TextSection ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div class="<?= $args['class'] ?>">
    <div class="TextSection-container">
    <div class="TextSection-text">
    <h2 class="TextSection-title"><?= $args['title'] ?></h2>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    </div><!-- // END .TextSection-text -->
    </div><!-- // END .TextSection-container -->
    </div><!-- // END .TextSection -->
<?php endif; ?>