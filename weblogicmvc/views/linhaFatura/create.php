<br>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class=" card-title m-0">Fatura</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- Main content -->
                <div class="invoice p-2 mb-2">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h3>
                                <img src="./public/img/logo.png"> <br>Fatura+, Inc.
                            </h3>
                            <h5>Date: <?= date_format($fatura->data,'Y/m/d') ?></h5>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Empresa:
                            <address>
                                <strong><?= $empresa->designacao_social ?></strong><br>
                                <?= $empresa->morada ?><br>
                                <?= $empresa->codigo_postal ?>, <?= $empresa->localidade ?><br>
                                Telefone: <?= $empresa->telefone ?><br>
                                Email: <?= $empresa->email ?><br>
                                Nif: <?= $empresa->nif ?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Cliente:
                            <address>
                                <strong><?= $fatura->cliente->username ?></strong><br>
                                <?= $fatura->cliente->morada ?><br>
                                <?= $fatura->cliente->codigo_postal ?>, <?= $fatura->cliente->localidade ?><br>
                                Nif: <?= $fatura->cliente->nif ?>
                            </address>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor Unitario</th>
                                    <th>Valor Iva</th>
                                    <th>Total</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($linhasFatura)){
                                    foreach ($linhasFatura as $linhaFatura) { ?>
                                        <tr>
                                            <td><?=$linhaFatura->produto->descricao?></td>
                                            <td><?=$linhaFatura->quantidade?></td>
                                            <td>€ <?=number_format($linhaFatura->valor_unitario,2)?></td>
                                            <td>€ <?=number_format($linhaFatura->valor_iva,2)?></td>
                                            <td>€ <?=$linhaFatura->quantidade * ($linhaFatura->valor_iva + $linhaFatura->valor_unitario)?></td>
                                            <td>
                                                <a href="?c=linhaFatura&a=edit&idLinhaFatura=<?=$linhaFatura->id?>" class="btn-sm text-decoration-none btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="?c=linhaFatura&a=destroy&idLinhaFatura=<?=$linhaFatura->id?>" class="btn-sm text-decoration-none btn-danger" ><i class="fa-solid fa-xmark"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                if(isset($produto)){?>
                                    <tr>
                                        <form action="./?c=linhaFatura&a=store&idFatura=<?=$fatura->id?>&idProduto=<?=$produto->id?>" method="post">
                                        <td><?=$produto->descricao?></td>
                                        <td><input type="number" value="0" id="quantidade" name="quantidade" min="1" max="<?=$produto->stock?>"></td>
                                        <td>€ <input readonly id="valor_unitario" name="valor_unitario" value="<?=number_format($produto->preco,2)?>"></td>
                                        <td>€ <input readonly id="valor_iva" name="valor_iva" value="<?=number_format(($produto->preco * ($produto->iva->percentagem/100)),2)?>"></td>
                                        <td>...</td>
                                        <td>
                                            <button type="submit" class="btn-sm text-decoration-none btn-success" ><i class="fas fa-check"></i></button>
                                        </form>
                                            <button onclick="window.open('./?c=linhaFatura&a=create&idFatura=<?=$fatura->id?>','_self')" class="btn-sm text-decoration-none btn-danger" ><i class="fas fa-xmark"></i></button>

                                        </td>
                                    </tr>
                                        <?php
                                }else{?>
                                <tr>
                                    <td colspan="7">
                                        <a href="./?c=linhaFatura&a=selectProduct&idFatura=<?=$fatura->id?>" class="btn-sm text-decoration-none btn-warning" >Selecionar Produto</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 20%;">
                                Fatura processada por <?= $fatura->user->username ?>
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>€ <?=number_format($fatura->valor_total,2)?></td>
                                    </tr>
                                    <tr>
                                        <th>IVA (...)</th>
                                        <td>€ <?=number_format($fatura->iva_total,2)?></td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>€ <?=number_format(($fatura->iva_total + $fatura->valor_total),2)?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing-->
                    <div class="row no-print">
                        <div class="col-12">
                            <!--<a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>-->
                            <a type="button" class="btn btn-danger float-right">
                                Cancelar
                            </a>
                            <?php
                            if(count($linhasFatura) != 0){?>
                            <a href="./?c=fatura&a=update&idFatura=<?=$fatura->id?>" type="button" class="btn btn-success float-right" style="margin-right: 5px;">
                                Emitir
                            </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<br><br>