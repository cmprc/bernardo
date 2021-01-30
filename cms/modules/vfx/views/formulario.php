<div id="add">
    <div class="card">

        <form id="form" data-ctr="<?php echo isset($item) ? 'update' : 'insert'; ?>">
            <input type="hidden" name="id" value="<?php echo isset($item) ? $item->id : ''; ?>">

            <div class="card-header">
                <h4 class="header-title"><?php echo !isset($item) ? 'Novo' : ''; ?> Projeto</h4>
                <div class="actions">
                    <a href="<?php echo site_url('vfx'); ?>" class="btn btn-light btn-xs mr-1">Cancelar</a>
                    <button type="submit" class="btn btn-dark btn-xs mr-1">Salvar</button>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="vfx_name" class="col-form-label">Nome</label>
                    <input class="form-control" type="text" value="<?php echo isset($item) ? $item->name : ''; ?>" name="name" id="vfx_name">
                </div>
                <div class="form-group">
                    <label for="vfx_description" class="col-form-label">Descrição</label>
                    <input class="form-control" type="text" value="<?php echo isset($item) ? $item->description : ''; ?>" name="description" id="vfx_description">
                </div>
                <div class="form-group">
                    <label for="vfx_text" class="col-form-label">Apresentação</label>
                    <textarea class="editor" id="vfx_text" name="text">
                        <?php echo isset($item) ? $item->text : ''; ?>
                    </textarea>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="vfx_author" class="col-form-label">Autor</label>
                        <input class="form-control" type="text" value="<?php echo isset($item) ? $item->author : ''; ?>" name="author" id="vfx_author">
                    </div>
                    <div class="col-md-6">
                        <label for="vfx_date" class="col-form-label">Data</label>
                        <input class="form-control" type="date" value="<?php echo isset($item) ? $item->date : ''; ?>" name="date" id="vfx_date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="vfx_youtube_link" class="col-form-label">Youtube</label>
                    <input class="form-control" type="text" value="<?php echo isset($item) ? $item->youtube_link : ''; ?>" name="youtube_link" id="vfx_youtube_link">
                </div>
            </div>

        </form>

    </div>
</div>
