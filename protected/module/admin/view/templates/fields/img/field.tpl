<div class="upload-file-image" style="clear: both">
    <div class="fileUpload btn btn-primary">
        <span>Carregar Imagem</span>
        <input type="file" name="{$name}" class="upload" accept="image/*" />
    </div>
    <div class="hr-dashed">
    </div>
    {if $val == ""}
        <img style="display: none;" height="150">
    {else}
        <img src="{$public}{$val}" height="150">
    {/if}
</div>