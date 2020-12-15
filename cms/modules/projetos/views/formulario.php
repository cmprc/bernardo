<div id="add">
    <div class="card">

        <form id="form" data-ctr="<?php echo isset($item) ? 'update' : 'insert'; ?>">
            <input type="hidden" name="id" value="<?php echo isset($item) ? $item->id : ''; ?>">

            <div class="card-header">
                <h4 class="header-title"><?php echo !isset($item) ? 'Novo' : ''; ?> Projeto</h4>
                <div class="actions">
                    <a href="<?php echo site_url('projetos'); ?>" class="btn btn-light btn-xs mr-1">Cancelar</a>
                    <button type="submit" class="btn btn-dark btn-xs mr-1">Salvar</button>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="project_name" class="col-form-label">Nome</label>
                    <input class="form-control" type="text" value="<?php echo isset($item) ? $item->name : ''; ?>" name="name" id="project_name">
                </div>
                <div class="form-group">
                    <label for="project_description" class="col-form-label">Descrição</label>
                    <input class="form-control" type="text" value="<?php echo isset($item) ? $item->description : ''; ?>" name="description" id="project_description">
                </div>
                <div class="form-group">
                    <label for="project_text" class="col-form-label">Apresentação</label>
                    <textarea class="editor" id="project_text" name="text">
                        <?php echo isset($item) ? $item->text : ''; ?>
                    </textarea>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="project_category" class="col-form-label">Categoria</label>
                        <select name="category" class="form-control" id="project_category">
                            <option value="video" <?php echo isset($item) && $item->category == 'videos' ? 'selected' : ''; ?>>Vídeos</option>
                            <option value="fotografia" <?php echo isset($item) && $item->category == 'fotografia' ? 'selected' : ''; ?>>Fotografia em vídeo</option>
                            <option value="projeto" <?php echo isset($item) && $item->category == 'projetos' ? 'selected' : ''; ?>>Projetos Independentes</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="project_author" class="col-form-label">Autor</label>
                        <input class="form-control" type="text" value="<?php echo isset($item) ? $item->author : ''; ?>" name="author" id="project_author">
                    </div>
                    <div class="col-md-4">
                        <label for="project_date" class="col-form-label">Data</label>
                        <input class="form-control" type="date" value="<?php echo isset($item) ? $item->date : ''; ?>" name="date" id="project_date">
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_youtube_link" class="col-form-label">Youtube</label>
                    <input class="form-control" type="text" value="<?php echo isset($item) ? $item->youtube_link : ''; ?>" name="youtube_link" id="project_youtube_link">
                </div>
            </div>

        </form>

    </div>
</div>
