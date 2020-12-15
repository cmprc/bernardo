var Blocos = $(function () {

  function Blocos() {
    if (!(this instanceof Blocos)) {
      return new Blocos();
    };
    this.init();
    this.submit();
  };

  Blocos.prototype.constructor = Blocos;

  Blocos.prototype.init = function () {
    var self = this;

    FilePond.registerPlugin(FilePondPluginFileEncode);

    const labels = {
      // labelIdle: 'Drag & Drop your files or <span class="filepond--label-action"> Browse </span>'
      labelIdle: 'Arraste e solte os arquivos ou <span class="filepond--label-action"> Clique aqui </span>',
      // labelInvalidField: 'Field contains invalid files',
      labelInvalidField: 'Arquivos inválidos',
      // labelFileWaitingForSize: 'Waiting for size',
      labelFileWaitingForSize: 'Calculando o tamanho do arquivo',
      // labelFileSizeNotAvailable: 'Size not available',
      labelFileSizeNotAvailable: 'Tamanho do arquivo indisponível',
      // labelFileLoading: 'Loading',
      labelFileLoading: 'Carregando',
      // labelFileLoadError: 'Error during load',
      labelFileLoadError: 'Erro durante o carregamento',
      // labelFileProcessing: 'Uploading',
      labelFileProcessing: 'Enviando',
      // labelFileProcessingComplete: 'Upload complete',
      labelFileProcessingComplete: 'Envio finalizado',
      // labelFileProcessingAborted: 'Upload cancelled',
      labelFileProcessingAborted: 'Envio cancelado',
      // labelFileProcessingError: 'Error during upload',
      labelFileProcessingError: 'Erro durante o envio',
      // labelFileProcessingRevertError: 'Error during revert',
      labelFileProcessingRevertError: 'Erro ao reverter o envio',
      // labelFileRemoveError: 'Error during remove',
      labelFileRemoveError: 'Erro ao remover o arquivo',
      // labelTapToCancel: 'tap to cancel',
      labelTapToCancel: 'clique para cancelar',
      // labelTapToRetry: 'tap to retry',
      labelTapToRetry: 'clique para reenviar',
      // labelTapToUndo: 'tap to undo',
      labelTapToUndo: 'clique para desfazer',
      // labelButtonRemoveItem: 'Remove',
      labelButtonRemoveItem: 'Remover',
      // labelButtonAbortItemLoad: 'Abort',
      labelButtonAbortItemLoad: 'Abortar',
      // labelButtonRetryItemLoad: 'Retry',
      labelButtonRetryItemLoad: 'Reenviar',
      // labelButtonAbortItemProcessing: 'Cancel',
      labelButtonAbortItemProcessing: 'Cancelar',
      // labelButtonUndoItemProcessing: 'Undo',
      labelButtonUndoItemProcessing: 'Desfazer',
      // labelButtonRetryItemProcessing: 'Retry',
      labelButtonRetryItemProcessing: 'Reenviar',
      // labelButtonProcessItem: 'Upload',
      labelButtonProcessItem: 'Enviar',
      // labelMaxFileSizeExceeded: 'File is too large',
      labelMaxFileSizeExceeded: 'Arquivo é muito grande',
      // labelMaxFileSize: 'Maximum file size is {filesize}',
      labelMaxFileSize: 'O tamanho máximo permitido: {filesize}',
      // labelMaxTotalFileSizeExceeded: 'Maximum total size exceeded',
      labelMaxTotalFileSizeExceeded: 'Tamanho total dos arquivos excedido',
      // labelMaxTotalFileSize: 'Maximum total file size is {filesize}',
      labelMaxTotalFileSize: 'Tamanho total permitido: {filesize}',
      // labelFileTypeNotAllowed: 'File of invalid type',
      labelFileTypeNotAllowed: 'Tipo de arquivo inválido',
      // fileValidateTypeLabelExpectedTypes: 'Expects {allButLastType} or {lastType}',
      fileValidateTypeLabelExpectedTypes: 'Tipos de arquivo suportados são {allButLastType} ou {lastType}',
      // imageValidateSizeLabelFormatError: 'Image type not supported',
      imageValidateSizeLabelFormatError: 'Tipo de imagem inválida',
      // imageValidateSizeLabelImageSizeTooSmall: 'Image is too small',
      imageValidateSizeLabelImageSizeTooSmall: 'Imagem muito pequena',
      // imageValidateSizeLabelImageSizeTooBig: 'Image is too big',
      imageValidateSizeLabelImageSizeTooBig: 'Imagem muito grande',
      // imageValidateSizeLabelExpectedMinSize: 'Minimum size is {minWidth} × {minHeight}',
      imageValidateSizeLabelExpectedMinSize: 'Tamanho mínimo permitida: {minWidth} × {minHeight}',
      // imageValidateSizeLabelExpectedMaxSize: 'Maximum size is {maxWidth} × {maxHeight}',
      imageValidateSizeLabelExpectedMaxSize: 'Tamanho máximo permitido: {maxWidth} × {maxHeight}',
      // imageValidateSizeLabelImageResolutionTooLow: 'Resolution is too low',
      imageValidateSizeLabelImageResolutionTooLow: 'Resolução muito baixa',
      // imageValidateSizeLabelImageResolutionTooHigh: 'Resolution is too high',
      imageValidateSizeLabelImageResolutionTooHigh: 'Resolução muito alta',
      // imageValidateSizeLabelExpectedMinResolution: 'Minimum resolution is {minResolution}',
      imageValidateSizeLabelExpectedMinResolution: 'Resolução mínima permitida: {minResolution}',
      // imageValidateSizeLabelExpectedMaxResolution: 'Maximum resolution is {maxResolution}'
      imageValidateSizeLabelExpectedMaxResolution: 'Resolução máxima permitida: {maxResolution}'
    };

    FilePond.setOptions(labels);

    $('#block_image').filepond({
      maxFileSize: '3MB',
      server: {
        url: site_url + 'blocos/',
        process: null,
        revert: null,
        restore: null,
        fetch: 'add'
      }
    });

  };

  Blocos.prototype.submit = function () {
    $('#form').submit(function (e) {
      e.preventDefault();

      let $form = $(this);
      let func = $form.data('ctr');

      $.ajax({
        type: "POST",
        url: site_url + 'blocos/' + func,
        data: $form.serialize(),
        dataType: "json",
        success: function (response) {
          console.log(response);

          if (response.status) {
            alert('salvo');
            window.location.href = site_url + 'blocos/index';
          }
          else {
            for (item in response.response) {
              alert(response.response[item]);
            }
          }

        },
        error: function () { alert("Error posting feed."); }
      });

    });
  };

  return Blocos;
}());
