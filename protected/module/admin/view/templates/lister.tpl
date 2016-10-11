<form>
    <div class="panel-body">
        <div class='panel-group'>
            {if $ff}
                <h3 class='title-filter'>Filtro</h3>
                <div class='filter'>
                    {foreach from=$arrFilter item=arr}
                        <div class='form-group'>
                            <label class='control-label'>
                                {$arr.label}
                            </label>
                            <div>
                                {$arr.html}
                            </div>
                        </div>
                        <div class="hr-dashed"></div>
                    {/foreach}
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Filtrar</button>
                        <button class="btn btn-danger limpar-filtro" type="button">Limpar</button>
                    </div>
                </div>
            </div>
            <hr>
        {/if}
        {if $fi or $isvisual}
            <div class='form-group top-btns'>
                {if $fi}
                    <a class='btn btn-success additem' href='{$url}insert'>Adicionar</a>
                {/if}
                {if $isvisual}
                    <a class='btn btn-default visual-edition' href='{$url}visual'>
                        <i class="icon-ui" style="font-size: 35px;"></i>
                        Edição Visual
                    </a>
                {/if}
            </div>
            <hr/>
        {/if}
        <table class="table table-striped table-bordered table-list table-hover {if $sortField}sortable-table{/if}">
            <thead>
                <tr>
                    {foreach from=$arrColumns key=name item=column}
                        <th data-name='{$name}'>{$column}</th>
                        {/foreach}
                    <th width="200"><em class="fa fa-cog"></em></th>
                </tr> 
            </thead>
            <tbody>
                {foreach from=$arrData item=arr}
                    <tr data-id="{$arr.__PK__}">
                        {foreach from=$arr key=k item=field}
                            {if $k != '__PK__'}
                                <td>{$field}</td>
                            {/if}
                        {/foreach}
                        <td align="center">
                            {if $fu}
                                <a href='{$url}update/{$arr.__PK__}' class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                {/if}
                                {if $fd}
                                <a href='{$url}remove/{$arr.__PK__}' class="btn btn-danger remove-item"><em class="fa fa-trash"></em></a>
                                {/if}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col col-xs-4">Página {$curpage} de {$lastpage}
            </div>
            {if $lastpage>1}
                <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                        {for $i=1 to $lastpage}
                            <li><a href="{$i}">{$i}</a></li>
                            {/for}
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            {/if}
        </div>
    </div>
    <input type="hidden" name="--pg--" value="{$curpage}" id='pager'/>
</form>