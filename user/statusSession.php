<div class="sair">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#logoutModal">
		Sair
	</button>
	<span class="btn badge-warning" style="font-size: 15px;">
		<b>Usuário:</b> <?php echo  $_SESSION['validarSessao'];  ?> <b>ID</b>: <?php echo $_SESSION['idUsu']; ?>
	</span>

	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="logoutModal">Realmente deseja sair? </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Ao clilcar em sair, a sessão será encerrada.
				</div>
				<div class="modal-footer">
					<a class="btn btn-danger" href="logoutUsu.php">Sair</a>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
</div>