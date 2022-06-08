<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabela de Ivas</h3><a href="./?c=iva&a=create" class="btn btn-primary float-right">Criar</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-responsive-md">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Percentagem</th>
                <th>Descrição</th>
                <th style="width: 40px">Em vigor</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ivas as $iva) { ?>
                <tr>
                    <td><?=$iva->id?></td>
                    <td><?=$iva->percentagem?> %</td>
                    <td><?=$iva->descricao?></td>
                    <td><?=$iva->em_vigor?></td>
                    <td>
                        <a href="?c=iva&a=edit&id=<?=$iva->id?>" class="btn-sm text-decoration-none btn-warning" >Editar</a>
                        <a href="?c=iva&a=destroy&id=<?=$iva->id?>" class="btn-sm text-decoration-none	btn-danger" >Deletar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>