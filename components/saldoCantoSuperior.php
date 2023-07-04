<?php
    // session_start();
    $dadosConta = $_SESSION['dadosConta'];
    $saldo = $dadosConta['saldoConta'];
?>
<div class="saldoCantoSuperior">
    <i class="bi bi-eye"></i>
    <i class="bi bi-eye-slash" style="display: none;"></i>
    <input type="text" id="saldoInput" value="R$ <?php echo $saldo ?>" readonly>
</div>