<select class='form-control multiple' name='{$name}[]' multiple >
    <option {if $val == ""}selected{/if}></option>
    {foreach from=$arr item=arrItem}
        <optgroup label="{$arrItem.group}">
            {foreach from=$arrItem.itens key=value item=label}
                <option value="{$value}" {if $value|in_array:$val}selected{/if}>{$label}</option>
            {/foreach}
        </optgroup>
    {/foreach}
</select>