<br>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Fatura</h1>
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
                                <i class="fas fa-globe"></i> <br>Fatura+, Inc.
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
                                    <th>Ref</th>
                                    <th>Descrição</th>
                                    <th>Qtd</th>
                                    <th>Preço Uni.</th>
                                    <th>IVA</th>
                                    <th>Taxa</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($produtos)){
                                    foreach ($produtos as $produto) { ?>
                                        <tr>
                                            <td><?=$produto->referencia?></td>
                                            <td><?=$produto->descricao?></td>
                                            <td>€ <?=number_format($produto->preco,2)?></td>
                                            <td><?=$produto->stock?></td>
                                            <td><?=$produto->iva->percentagem?> </td>
                                        </tr>
                                    <?php }
                                }
                                    ?>
                                <tr>
                                    <td colspan="7">
                                        <a href="?c=linhaFatura&a=selectProduct" class="btn-sm text-decoration-none btn-warning" >Selecionar Produto</a>
                                    </td>
                                </tr>
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
                                Fatura processada por <?= $fatura->user-username ?>
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>€...</td>
                                    </tr>
                                    <tr>
                                        <th>IVA (...)</th>
                                        <td>€...</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>€...</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                            <a type="button" class="btn btn-danger float-right">
                                Anular
                            </a>
                            <a type="button" class="btn btn-success float-right" style="margin-right: 5px;">
                                Validar
                            </a>
                        </div>
                    </div>-->
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<br><br>