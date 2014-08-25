<?php

function middleTitle($text)
{
    echo '<h2 class="middle-title">', $text, '</h2>';
}

function formOpen($data)
{
    echo '<form action="handlers/', $data['action'], '.php" role="form" id="', $data['id'], '" method="', (array_key_exists('method', $data)) ? $data['method'] : 'POST', '" class="', (array_key_exists('class', $data)) ? $data['class'] : '', '">';
}

function formClose()
{
    echo '</form>';
}

function formGroup($data)
{
    echo '
    <div class="form-group has-feedback">
        <label class="control-label" for="', $data['name'], '">', $data['text'], '</label>
        <input type="', (array_key_exists('type', $data)) ? $data['type'] : 'text', '" class="form-control" name="', $data['name'], '" id="', $data['name'], '" placeholder="', $data['text'], '" ', (array_key_exists('req', $data)) ? 'required' : '', '>
        <span class="glyphicon form-control-feedback"></span>
    </div>
    ';
}

function subBtn($text)
{
    echo '<input type="submit" class="btn btn-primary" value="', $text, '">';
}
