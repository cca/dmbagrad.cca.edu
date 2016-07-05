
<?php $action = $this->config->route['controllerId'] == 'TrashController' ? 'trash' : 'all'; ?>
<div class="container">
  <h2><?= $action == 'trash' ? 'Trash bucket': 'All projects' ?></h2>      
  <table class="table table-hover">
      <?php if( $action == 'all' ): ?>
        <form action="/admin">
          <input type="text" placeholder='Search projects' name='filter[text]' value='<?= Sili::$app->request->get('filter', ['text' => ''])['text'] ?>'>
        </form>
      <?php endif; ?>
      <?php if ($projects): ?>
        
        <thead>
          <tr>
            <th>Project name</th>
            <th>Semester</th>
            <th>Course</th>
            <th>VAULT link</th>
            <th>View</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        
        <?php foreach ($projects as $key => $value): ?>
          <tr>
              <td><?= $value['name'] ?></td>
              <td><?= $value['semester'] ?></td>
              <td><?= $value['course'] ?></td>
              <td><a href="<?= $value['link'] ?>" target='__blank'>Link</a></td>
              <td><a href="/admin/project/edit/id/<?= $value['id'] ?>">View</a></td>
              <td><a href="/admin/project/toogle/id/<?= $value['id'] ?>"><?= $action == 'trash' ? 'Restore': 'Delete' ?></a></td>
            </tr>
        <?php endforeach ?>
      <?php else: ?>
        <h3>Empty</h3>
      <?php endif ?>
      
      
    </tbody>
  </table>
</div>