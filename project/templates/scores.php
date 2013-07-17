<div class="container-narrow">
  <div class="row-fluid">
    <div class="span12">
      <h3>Scores</h3>
    </div>
  </div>
  <div class="row-fluid">
    <div class="well span12">

      <?php 

      $scores = Score::find_all();

      if ( !!$scores ): 
        usort( $scores, "sort_by_score" );

      ?>

        <table class="table">
          <thead>
            <th>Rank</th>
            <th>Score</th>
            <th>User</th>
          </thead>
          <tbody class="scores-tbody">
            <?php foreach( $scores as $rank=>$user_score ): ?>
            <tr>
              <td><?php echo $rank ?></td>
              <td><?php echo $user_score->$score ?></td>
              <td><?php echo $user_score->$username ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      <?php else: ?>
      <p class="text-primary">No scores yet!</p>

      <?php endif; ?>

    </div>
  </div>
</div>