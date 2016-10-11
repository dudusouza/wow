<select class='form-control' name='{$name}' >
    <option {if $val == ""}selected{/if}></option>
    {foreach from=$arr key=value item=label}
        <option value="{$value}" {if ($val == $value) and ($val != "")}selected{/if}>{$label}</option>
    {/foreach}
</select>