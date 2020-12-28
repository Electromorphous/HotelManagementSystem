<?php

function inputElement($type, $icon, $placeholder, $name, $value) {
    $ele = "
    
    <div class='input-group mb-2'>
        <div class='input-group-prepend'>
            <div class='input-group-text bg-primary text-light'>$icon</div>
        </div>
        <input type='$type' name='$name' value='$value' class='form-control' id='inlineFormInputGroup' placeholder='$placeholder'
            autocomplete='off'>
    </div>

    ";
    echo $ele;
}

function buttonElement($btnid, $styleClass, $text, $name, $attr) {
    $button = "

        <button id='$btnid' class='$styleClass' name='$name' '$attr'>$text</button>

    ";
    echo $button;
}