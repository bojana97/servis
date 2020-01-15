<?php
if(!empty($atributiKategorije)):
$nazivKategorije=$atributiKategorije[0]['nazivKat'];
?>
<table class="table table-bordered table-hover">
  <tbody>

	<?php foreach($atributiKategorije[0]['atributi'] as $atribut): ?>
	<tr>
      <td><?= $atribut['nazivAtr'] ?></td>
    </tr>
	<?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
  <div class="alert alert-info"> Kategorija nema unesene atribute! </div>
 <?php endif; ?>