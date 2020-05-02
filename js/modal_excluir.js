$(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');
        if (!$('#confirm-delete').length) {
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                '<div class="modal-dialog">' +
                '<div class="modal-content">' +
                '<div class="modal-header bg-danger text-white">' +
                'EXCLUIR ÁRVORE' +
                '<button type="button" class="close" data-dismiss="modal" aria--label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button></div>' +
                '<div class="modal-body">Tem certeza de que deseja excluir a árvore selecionada?</div>' +
                '<div class="modal-footer">' +
                '<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>' +
                '<a class="btn btn-danger text-white" id="dataComfirmOK">Excliur</a></div></div></div></div>');
        }
        $('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({ show: true });
        return false;

    });
});