<?php
// NÃO MEXA NESTE ARQUIVO SE VOCÊ NÃO TIVER EXPERIÊNCIA COM DESENVOLVIMENTO DE SOFTWARE
// DÚVIDAS OU SUGESTÕES: lmainformatica@gmail.com    

use PagTesouro\Helper\UrlHelper;

?>

<?php require_once('./inc/header.php') ?>
<form action="process.php" method="post">

    <input name="codigoUg" id="codigoUg" type="hidden" value="<?= $ug->getCodigoUg() ?>" />
    <div class="row">
        <div class="col col-md-6">
            <div class="form-group">
                <label for="codigoServico">Código do Serviço</label>
                <?php
                if (UrlHelper::temServico($ug->getServicos())) {
                    include_once('./inc/texto_servico.php');
                } else {
                    include_once('./inc/select_servicos.php');
                }

                ?>
            </div>
            <div class="form-group">
                <label for="nomeContribuinte">Nome do Contribuinte</label>
                <input name="nomeContribuinte" value="<?= $pagamento->getNomeContribuinte() ?>" id="nomeContribuinte" class="form-control" type="text" maxlength="45" size="45" required>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipoPessoa" id="radioPF" value="PF" <?= $pagamento->getTipoPessoa() == "PF" ? 'checked' : '' ?>>
                <label class="form-check-label" for="radioPF">CPF (Pessoa Física)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipoPessoa" id="radioPJ" value="PJ" <?= $pagamento->getTipoPessoa() == "PJ" ? 'checked' : '' ?>>
                <label class="form-check-label" for="radioPJ">CNPJ (Pessoa Jurídica) </label>
            </div>
            <div class="form-group">
                <input name="cnpjCpf" value="<?= $pagamento->getCnpjCpf() ?>" id="cnpjCpf" class="form-control cpfcnpj" type="text" required>
            </div>
            <div class="form-group">
                <label for="referencia">Referência (Numérico)</label>
                <input name="referencia" value="<?= $pagamento->getReferencia() ?>" id="referencia" class="form-control" min="0" type="text" maxlength="20">
            </div>
            <div class="form-group">
                <label for="competencia">Competência</label>
                <input name="competencia" value="<?= $pagamento->getCompetencia() ?>" id="competencia" class="form-control" type="text" placeholder="MM/AAAA" maxlength="7">
            </div>
            <div class="form-group">
                <label for="vencimento">Vencimento</label>
                <input name="vencimento" value="<?= $pagamento->getVencimento() ?>" id="vencimento" class="form-control" type="text" placeholder="DD/MM/AAAA" maxlength="10">
            </div>

        </div> <!-- fim primeira coluna -->
        <div class="col-md-6">

            <div class="form-group">
                <label for="valorPrincipal">Valor Principal</label>
                <input name="valorPrincipal" value="<?= !empty($pagamento->getValorPrincipal())? $pagamento->getValorPrincipal() : UrlHelper::getValorOuVazio()  ?>" id="valorPrincipal" class="form-control currency" type="text" placeholder="0,00" required>
            </div>
            <div class=" form-group">
                <label for="valorDescontos">Descontos</label>
                <input name="valorDescontos" value="<?= $pagamento->getValorDescontos() ?>" id="valorDescontos" class="form-control currency" type="text" placeholder="0,00">
            </div>
            <div class=" form-group">
                <label for="valorOutrasDeducoes">Outras Deduções</label>
                <input name="valorOutrasDeducoes" value="<?= $pagamento->getValorOutrasDeducoes() ?>" id="valorOutrasDeducoes" class="form-control currency" type="text" placeholder="0,00">
            </div>
            <div class=" form-group">
                <label for="valorMulta">Multa</label>
                <input name="valorMulta" value="<?= $pagamento->getValorMulta() ?>" id="valorMulta" class="form-control currency" type="text" placeholder="0,00">
            </div>
            <div class=" form-group">
                <label for="valorJuros">Juros</label>
                <input name="valorJuros" value="<?= $pagamento->getValorJuros() ?>" id="valorJuros" class="form-control currency" type="text" placeholder="0,00">
            </div>
            <div class=" form-group">
                <label for="valorOutrosAcrescimos">Outros Acréscimos</label>
                <input name="valorOutrosAcrescimos" value="<?= $pagamento->getValorOutrosAcrescimos() ?>" id="valorOutrosAcrescimos" class="form-control currency" type="text" placeholder="0,00">
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-lg btn-primary">Gerar Solicitação</button>
    </div>
</form>

<?php require_once('./inc/footer.php') ?>