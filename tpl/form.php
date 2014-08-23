<?php
function formOpen($action, $method = 'POST', $name = '', $class = '', $additional = '')
{
    echo '<form name="', $name, '" action="', $action, '" method="', $method, '" class="', $class, '" role="form" ', $additional, '>';
}

function formClose()
{
    echo '</form>';
}

function formGroupOpen($class = '', $additional = '')
{
    echo '<div class="form-group ', $class, '" ', $additional, '>';
}

function formGroupClose()
{
    echo '</div>';
}

function formLabel($text, $for, $class = '', $additional = '')
{
    echo '<label for="', $for, '" class="', $class, '" ', $additional, '>', $text, '</label>';
}

function formInput($name, $type = 'text', $class = '', $placeholder = '', $is_required = false)
{
    echo '<input type="', $type, '" name="', $name, '" id="', $name, '" class="form-control ', $class, '" placeholder="', $placeholder, '"', (($is_required) ? ' required' : ''), '>';
}