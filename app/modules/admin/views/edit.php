
<div class="container col-md-6 col-md-offset-3">
  <h2>View project</h2>
    <?php foreach ($project['project'] as $key => $value): ?>
      <?php if ($key != 'id' && $key != 'category'): ?>
        <div class="form-group">
          <label class="control-label col-sm-2"><?= $key ?>:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value='<?= $value ?>' name='<?= $key ?>' style='margin-bottom: 15px;' placeholder="Enter '<?= $key ?>'" disabled>
          </div>
        </div>
      <?php endif ?>
    <?php endforeach ?>
</div>